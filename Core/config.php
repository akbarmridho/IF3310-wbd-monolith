<?php

return [
    'database' => [
        'type' => 'pgsql',
        'name' => getenv('DB_NAME'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'host' => getenv('DB_HOST'),
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ],
    ],
    'rest-host' => getenv("REST_HOST"),
    'rest-host-client' => getenv("REST_HOST_CLIENT"),
    'rest-api-key' => getenv("REST_API_KEY"),
    'soap-host' => getenv("SOAP_HOST"),
];