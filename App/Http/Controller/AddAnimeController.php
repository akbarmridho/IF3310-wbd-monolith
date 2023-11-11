<?php

namespace App\Http\Controller;

use App\Model\Anime;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Rules\ImageRule;
use Core\Validator\Rules\VideoRule;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Types\TimestampType;
use Core\Validator\Types\UploadedFileType;
use Core\Validator\Validator;

class AddAnimeController extends BaseController
{
    public function addAnimeView(Request $request)
    {
        render('addanime');
    }

    public function addAnime(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'title' => new StringType(required: true),
            'global_id' => new StringType(required: false, nullable: true),
            'studio' => new StringType(required: false, nullable: true),
            'genre' => new StringType(required: false, nullable: true),
            'description' => new StringType(required: false, nullable: true),
            'episode_count' => new IntType(required: false, nullable: true, shouldCast: true),
            'air_date_start' => new TimestampType(required: false, nullable: true),
            'air_date_end' => new TimestampType(required: false, nullable: true),
            'poster' => new UploadedFileType(required: false, rules: [new ImageRule()]),
            'trailer' => new UploadedFileType(required: false, rules: [new VideoRule()])
        ]);

        if ($validated->isError()) {
            render('addanime');
        } else {


            if (array_key_exists('poster', $validated->data)) {

                if ($validated->data['poster']['name'] !== '') {
                    // handle image upload
                    $poster = $validated->data['poster'];
                    $validated->data['poster'] = move_uploaded_to_storage($poster['tmp_name'], $poster['name']);
                } else {
                    // need to check name is not empty because if empty then no image exist
                    unset($validated->data['poster']);
                }
            }

            if (array_key_exists('trailer', $validated->data)) {

                if ($validated->data['trailer']['name'] !== '') {
                    // handle video upload
                    $trailer = $validated->data['trailer'];
                    $validated->data['trailer'] = move_uploaded_to_storage($trailer['tmp_name'], $trailer['name']);
                } else {
                    // need to check name is not empty because if empty then no image exist
                    unset($validated->data['trailer']);
                }
            }

            if (array_key_exists('global_id', $validated->data)) {
                if ($validated->data['global_id'] === "") {
                    $validated->data['global_id'] = null;
                }
            }

            $rowCount = Anime::create($validated->data);
            if ($rowCount == 0) {
                render('addanime', ['error' => 'Failed to add new anime']);
            } else {
                Session::setMessage('Anime added successfully');
                redirect('');
            }
        }
    }
}
