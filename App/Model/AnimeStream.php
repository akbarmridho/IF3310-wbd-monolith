<?php

namespace App\Model;

use Core\HttpClient\HttpClient;
use Core\Session\Session;
use DateTime;

/**
 * @property string id
 * @property string title
 * @property string? status
 * @property int? totalEpisodes
 * @property int? airedEpisodes
 * @property string? broadcastInformation
 * @property DateTime createdAt
 */
class AnimeStream extends BaseRest
{
    protected array $attributes = [
        'id',
        'title',
        'status',
        'totalEpisodes',
        'airedEpisodes',
        'broadcastInformation',
        'createdAt'
    ];

    protected array $datetimeAttributes = [
        'createdAt'
    ];

    public static function findByGlobalId(string $id)
    {
        $url = static::$baseUrl . "/anime/" . $id;
        $userId = Session::$user->id;
        $response = HttpClient::get($url, null, [
            'Authorization' => 'Basic ' . base64_encode($userId . ":" . static::$apiKey)
        ]);

        return new AnimeStream($response->getBody()['data']);
    }
}