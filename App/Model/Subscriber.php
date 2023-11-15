<?php

namespace App\Model;

use Core\App;
use Core\Base\Model;
use Core\Database\Connection;
use DateTime;
use SoapClient;
use SoapHeader;

/**
 * @property int $id
 * @property DateTime $subscriptionStartTime
 * @property DateTime $subscriptionEndTime
 * @property string $email
 */
class Subscriber extends BaseSoap
{
    protected static SoapClient $client;
    protected static string $serviceName;
    protected array $attributes = [
        'id',
        'subscriptionStartTime',
        'subscriptionEndTime',
        'email'
    ];

    protected array $datetimeAttributes = [
        'subscriptionStartTime',
        'subscriptionEndTime',
    ];

    public static function setSoapClient(string $service) {
        static::$serviceName = static::$baseUrl . '/' . $service;
        static::$client = new SoapClient(static::$serviceName . '?wsdl', array(
            'stream_context' => stream_context_create(array(
                'http' => array(
                    'header' => 'Authorization: ' . static::$apiKey
                )
            ))
        ));
    }

    public static function findById(int $id): null|Subscriber
    {
        $result = static::$client->__soapCall('getSubscriber', array(
            'getSubscriber' => array(
                'arg0' => $id,
            )
        ));

        if (empty((array) $result)) {
            return null;
        }

        return new Subscriber((array)$result->return);
    }

    public static function createSubscriber(int $id, string $email): Subscriber|null
    {
        $result = static::$client->__soapCall('createSubscriber', array(
            'createSubscriber' => array(
                'arg0' => $id,
                'arg1' => $email,
            )
        ));

        if (empty((array) $result)) {
            return null;
        }

        return new Subscriber((array)$result->return);
    }

    public static function renewSubscriber(int $id): Subscriber|null
    {
        $result = static::$client->__soapCall('renewSubscriber', array(
            'renewSubscriber' => array(
                'arg0' => $id,
            )
        ));

        if (empty((array) $result)) {
            return null;
        }

        return new Subscriber((array)$result->return);
    }

    public static function isSubscribed(int $id): bool
    {
        $data = static::findById($id);
        
        if ($data === null) {
            return false;
        }

        $now  = new DateTime();

        return $data->subscriptionEndTime > $now;
    }

}

