<?php

namespace App\Http\Controller;

use App\Model\Anime;
use App\Model\AnimeStream;
use Core\Base\BaseController;
use Core\Http\Request;

class AnimeStreamController extends BaseController
{
    public function index(Request $request)
    {
        $id = (int)$request->getRouteParam('id');
        $anime = Anime::findById($id);

        if (!is_null($anime->global_id) && $anime->global_id !== "") {
            AnimeStream::findByGlobalId($anime->global_id);
        }

        render('anime-stream', [
                'anime' => $anime
            ]
        );
    }

    public function view()
    {
        //
    }
}