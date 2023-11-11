<?php

namespace Core\HttpClient;

use Exception;

class HttpResponse
{
    private $response;
    private $headers;

    public function __construct($response, $headers = [])
    {
        $this->response = $response;
        $this->headers = $headers;
    }

    public function getBody()
    {
        // If the payload is in json, try to decode json.
        if (str_contains(strtolower(implode(', ', $this->headers)), 'application/json')) {
            $result = json_decode($this->response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $result;
            } else {
                throw new Exception("Error decoding JSON: " . json_last_error());
            }
        }

        // handle here for soap if the response is xml

        return $this->response;
    }
}