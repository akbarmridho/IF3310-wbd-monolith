<?php

namespace Core\Base;

use Core\App;
use DateTime;
use Core\Database\Connection;
use Core\Exception\ModelAttributeNotExist;

abstract class Model
{
    protected array $attributes = [];

    protected array $relationalAttributes = [];

    protected array $datetimeAttributes = [];

    protected array $data = [];

    public static Connection $connection;

    public function __construct(array $data)
    {
        $this->data = $data;

        foreach ($this->datetimeAttributes as $attribute) {
            if (array_key_exists($attribute, $this->data) && !is_null($this->data[$attribute])) {
                $result = DateTime::createFromFormat('Y-m-d H:i:s.u', $this->data[$attribute]);

                if ($result) {
                    $this->data[$attribute] = $result;
                    continue;
                }

                // handle uncasted date from microseconds
                $result = DateTime::createFromFormat('Y-m-d H:i:s', $this->data[$attribute]);
                
                if ($result) {
                    $this->data[$attribute] = $result;
                    continue;
                }

                // handle T Z format
                $tzdate = date('Y-m-d H:i:s', strtotime($this->data[$attribute]));
                $result = DateTime::createFromFormat('Y-m-d H:i:s', $tzdate);

                if ($result) {
                    $this->data[$attribute] = $result;
                    continue;
                }
            }
        }
    }

    public function __get(string $key): mixed
    {
        if (in_array($key, $this->attributes)) {
            return $this->data[$key];
        } else if (in_array($key, $this->relationalAttributes)) {
            if (array_key_exists($key, $this->data)) {
                return $this->data[$key];
            }

            return null;
        }

        $cls = get_class($this);
        throw new ModelAttributeNotExist("No attribute $key for $cls");
    }

    public function __set(string $key, mixed $value): void
    {
        if (!in_array($key, $this->attributes)) {
            $cls = get_class($this);
            throw new ModelAttributeNotExist("No attribute $key for $cls");
        }

        $this->data[$key] = $value;
    }
}