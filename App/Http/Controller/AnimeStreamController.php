<?php

namespace App\Http\Controller;

use App\Model\Anime;
use App\Model\AnimeStream;
use App\Model\Episode;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Http\Response;

class AnimeStreamController extends BaseController
{
    public function index(Request $request)
    {
        $id = (int)$request->getRouteParam('id');
        $anime = Anime::findById($id);

        if (is_null($anime->global_id) || $anime->global_id === "") {
            Response::status(404);
            render('404');
            return;
        }

        $animeStream = AnimeStream::findByGlobalId($anime->global_id);

        render('anime-stream', [
                'animeStream' => $animeStream,
                'anime' => $anime
            ]
        );
    }

    public function view(Request $request)
    {
        $animeId = $request->getRouteParam('id');
        $episodeNumber = (int)$request->getQueryData()['episode'];

        $anime = Anime::findById($animeId);

        if (is_null($anime->global_id) || $anime->global_id === "") {
            Response::status(404);
            render('404');
            return;
        }

        $animeStream = AnimeStream::findByGlobalId($anime->global_id);
        $episode = Episode::findByEpisodeNumber($anime->global_id, $episodeNumber);

        render('anime-stream-episode', [
            'anime' => $anime,
            'animeStream' => $animeStream,
            'episode' => $episode
        ]);
    }
}