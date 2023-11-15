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

        // var_dump($result);

        // TODO convert stdClass to model
        // FIXME
        return new Subscriber((array)$result->return);
    }

    public static function create(array $data): Subscriber|null
    {
        // TODO
        return null;
    }

    public static function renewSubscriber(int $id): Subscriber|null
    {
        // TODO
        return null;
    }

}

