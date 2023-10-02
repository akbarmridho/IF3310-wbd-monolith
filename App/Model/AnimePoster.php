<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

/**
 * @property int anime_id
 * @property string poster
 */
class AnimePoster extends Model
{
    public function __construct(array $data)
    {
        $this->attributes = array(
            'anime_id',
            'poster'
        );
        $this->data = $data;
    }

    public static function findById(int $id) {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch rows */
        $result = $connection->executeStatement('SELECT * FROM Anime_Poster WHERE anime_id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return array_map(fn($row) => new AnimePoster($row), $result);
    }
}

