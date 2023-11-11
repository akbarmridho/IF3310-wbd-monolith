<?php

namespace App\Model;

use Core\Base\Model;

class BaseRest extends Model
{
    protected static string $baseUrl;
    protected static string $baseUrlClient;
    protected static string $apiKey;

    public static function setBaseUrl(string $baseUrl)
    {
        static::$baseUrl = $baseUrl;
    }

    public static function setBaseUrlClient(string $baseUrl)
    {
        static::$baseUrlClient = $baseUrl;
    }

    public static function setApiKey(string $apiKey)
    {
        static::$apiKey = $apiKey;
    }
}