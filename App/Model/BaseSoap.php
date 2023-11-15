<?php

namespace App\Model;

use Core\Base\Model;

class BaseSoap extends Model
{
    protected static string $baseUrl;
    protected static string $apiKey;

    public static function setBaseUrl(string $baseUrl)
    {
        static::$baseUrl = $baseUrl;
    }

    public static function setApiKey(string $apiKey)
    {
        static::$apiKey = $apiKey;
    }
}