<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;
use DateTime;
use PDOException;

/**
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $bio
 * @property string $role
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class User extends Model
{
    public function __construct(array $data)
    {
        $this->attributes = array(
            'id',
            'name',
            'username',
            'password',
            'bio',
            'role',
            'created_at',
            'updated_at'
        );
        $this->data = $data;
    }

    public static function findById(int $id): null|User
    {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $result = $connection->executeStatement('SELECT * FROM User_Data WHERE id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return new User($result[0]);
    }

    public static function findByUsername(string $username): null|User
    {
        /* execute query, fetch one row */
        $result = static::$connection->executeStatement('SELECT * FROM User_Data WHERE username = :username', ['username' => $username]);
        if (empty($result)) {
            return null;
        }

        return new User($result[0]);
    }

    public static function create(array $data): int {
        $columns = array_keys($data);
        $values = array_values($data);

        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO user_data (" . implode(', ', $columns) . ") VALUES (" . str_repeat('?, ', count($values) - 1) . "?)",
            $values
        );

        return static::$connection->rowCount();
    }

    public static function remove(int $id)
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement('DELETE FROM user_data WHERE id = :id;', ['id' => $id]);

        return static::$connection->rowCount();
    }

    public static function update(int $id, array $data): int {
        $columns = array_keys($data);
        $values = array_values($data);

        /* update values */
        $update_set = '';
        foreach ($columns as $col) {
            $update_set .= "$col = ?, ";
        }
        $update_set = substr($update_set, 0, -2);

        /* execute query, update values */
        static::$connection->executeStatement(
            "UPDATE user_data SET $update_set WHERE id = ?",
            array_merge($values, array($id))
        );

        return static::$connection->rowCount();
    }
}

