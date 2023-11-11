<?php

namespace App\Model;

use Core\HttpClient\HttpClient;
use Core\Session\Session;

/**
 * @property string animeId
 * @property int episodeNumber
 * @property string title
 */
class Episode extends BaseRest
{
    protected array $attributes = [
        'animeId',
        'title',
        'episodeNumber'
    ];

    public static function findByEpisodeNumber(string $animeId, int $episodeNumber)
    {
        $url = static::$baseUrl . "/anime/" . $animeId . '/episodes/' . $episodeNumber;
        $userId = Session::$user->id;
        $response = HttpClient::get($url, null, [
            'Authorization' => 'Basic ' . base64_encode($userId . ":" . static::$apiKey)
        ]);

        return new Episode($response->getBody()['data']);
    }

    public function getStreamUrl(): string
    {
        $url = static::$baseUrlClient . "/anime/" . $this->animeId . '/episodes/' . $this->episodeNumber . '/stream';
        $userId = Session::$user->id;
        $token = base64_encode($userId . ":" . static::$apiKey);

        return $url . "?token=" . $token;
    }
}