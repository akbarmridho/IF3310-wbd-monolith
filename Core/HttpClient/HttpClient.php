<?php

namespace Core\HttpClient;

use Exception;

class HttpClient
{
    public static function get($url, $body = null, $headers = [])
    {
        return self::send('GET', $url, $body, $headers);
    }

    public static function post($url, $body = null, $headers = [])
    {
        return self::send('POST', $url, $body, $headers);
    }

    public static function put($url, $body = null, $headers = [])
    {
        return self::send('PUT', $url, $body, $headers);
    }

    public static function delete($url, $body = null, $headers = [])
    {
        return self::send('DELETE', $url, $body, $headers);
    }

    private static function buildRequest(string $method, string $url, $body = null, $headers = [])
    {
        $content = '';

        $method = strtoupper($method);
        $headers = array_change_key_case($headers, CASE_LOWER);

        switch ($method) {
            case 'GET':
                if (is_array($body)) {
                    if (str_contains($url, '?')) {
                        $url .= '&';
                    } else {
                        $url .= '?';
                    }

                    $url .= urldecode(http_build_query($body));
                }
                break;
            case 'DELETE':
            case 'PUT':
            case 'POST':
                if (is_array($body)) {
                    if (!empty($headers['content-type'])) {
                        switch (trim($headers['content-type'])) {
                            case 'application/x-www-form-urlencoded':
                                $body = http_build_query($body);
                                break;
                            case 'application/json':
                                $body = json_encode($body);
                                break;
                        }
                    } else {
                        $headers['content-type'] = 'application/x-www-form-urlencoded';
                        $body = http_build_query($body);
                    }
                } elseif (empty($headers['content-type'])) {
                    $headers['content-type'] = 'application/x-www-form-urlencoded';
                }

                $content = $body;
                break;
        }

        $options = [
            'http' => [
                'method' => $method,
            ],
        ];

        if ($headers) {
            $options['http']['header'] = implode(
                "\r\n",
                array_map(
                    function ($v, $k) {
                        return sprintf("%s: %s", $k, $v);
                    },
                    $headers,
                    array_keys($headers)
                )
            );
        }

        if ($content) {
            $options['http']['content'] = $content;
        }

        return [$url, $options];
    }

    public static function send($method, $url, $body = null, $headers = [])
    {
        [$url, $options] = self::buildRequest($method, $url, $body, $headers);

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            $status_line = implode(',', $http_response_header);
            preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
            $status = $match[1];

            // If the status code not in 2xx or 3xx, throw an exception.
            if (!str_starts_with($status, '2') && !str_starts_with($status, '3')) {
                throw new Exception("Unexpected response status: {$status} while fetching {$url}\n" . $status_line);
            }
        }

        return new HttpResponse($result, $http_response_header);
    }
}