<?php

namespace App\Model;

use Core\Base\Model;
use DateTime;

/**
 * @property int id
 * @property string title
 * @property ?string studio
 * @property ?string genre
 * @property ?string description
 * @property ?int episode_count
 * @property ?DateTime air_date_start
 * @property ?DateTime air_date_end
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property ?string poster
 * @property ?string trailer
 * @property ?string global_id
 *
 * @property ?float rating
 * @property ?int members
 */
class Anime extends Model
{
    protected array $attributes = [
        'id',
        'global_id',
        'title',
        'studio',
        'genre',
        'description',
        'episode_count',
        'air_date_start',
        'air_date_end',
        'created_at',
        'updated_at',
        'poster',
        'trailer'
    ];

    protected array $relationalAttributes = [
        'rating',
        'members'
    ];

    public static array $genres = [
        'Action',
        'Fantasy',
        'Comedy',
        'Sports',
        'Drama',
        'Romance',
        'Sci-Fi',
        'Slice of Life'
    ];

    protected array $datetimeAttributes = [
        'air_date_start',
        'air_date_end',
        'created_at',
        'updated_at'
    ];

    public static function findById(int $id): null|Anime
    {
        /* execute query, fetch one row */
        $result = static::$connection->executeStatement(
            'SELECT *,
            COALESCE(o_members, 0) as members
            FROM anime a
            LEFT JOIN (
                SELECT COUNT(ua.user_id) as o_members, ua.anime_id as anime_id
                FROM user_anime ua
                GROUP BY ua.anime_id
            ) m ON a.id = m.anime_id
            LEFT JOIN (
                SELECT AVG(r.rating) as rating, r.anime_id as anime_id
                FROM review r
                GROUP BY r.anime_id
            ) re ON a.id = re.anime_id WHERE a.id = :id',
            ['id' => $id]
        );
        if (empty($result)) {
            return null;
        }

        return new Anime($result[0]);
    }

    public static function findAll(
        int    $userId = null,
        string $genre = 'all',
        string $status = 'all',
        string $sort_by = 'members',
        string $search_by = 'title',
        string $sort = 'desc',
        string $q = '',
        int    $page = 1,
        int    $limit = 9
    ): array
    {
        $sql = 'SELECT *,
                COALESCE(o_members, 0) as members
                FROM anime a
                LEFT JOIN (
                    SELECT COUNT(ua.user_id) as o_members, ua.anime_id as anime_id
                    FROM user_anime ua
                    GROUP BY ua.anime_id
                ) m ON a.id = m.anime_id
                LEFT JOIN (
                    SELECT AVG(r.rating) as rating, r.anime_id as anime_id
                    FROM review r
                    GROUP BY r.anime_id
                ) re ON a.id = re.anime_id';

        $sqlCount = 'SELECT COUNT(*) as count 
                     FROM anime a
                     LEFT JOIN (
                     SELECT AVG(r.rating) as rating, r.anime_id as anime_id
                     FROM review r
                     GROUP BY r.anime_id
                     ) re ON a.id = re.anime_id';

        $parameters = [];
        $where = [];

        if ($genre !== 'all') {
            $where[] = 'genre = :genre';
            $parameters['genre'] = $genre;
        }

        if ($status !== 'all' && $userId !== null) {
            $idsRaw = static::$connection->executeStatement('SELECT anime_id FROM user_anime WHERE status = :status AND user_id = :user_id',
                [
                    'status' => $status,
                    'user_id' => $userId
                ]);

            $ids = array_map(fn($row): int => $row['anime_id'], $idsRaw);

            // asume valid and safe ids so we don't consider possible sql injection here

            if (count($ids) === 0) {
                $where[] = '1 = 2';
            } else {
                $where[] = 'id IN (' . implode(', ', $ids) . ')';
            }
        }

        if ($q !== '') {
            $where[] = $search_by . ' ILIKE :q';
            $parameters['q'] = '%' . $q . '%';
        }

        if ($sort_by === 'rating') {
            $where[] = 'rating is not null';
        }

        if (count($where) !== 0) {
            $sql = $sql . ' WHERE ';
            $sqlCount = $sqlCount . ' WHERE ';
        }

        $sql = $sql . implode(' AND ', $where);
        $sqlCount = $sqlCount . implode(' AND ', $where);

        $sql = $sql . ' ORDER BY ' . $sort_by . ' ' . $sort;
        $sql = $sql . ' OFFSET ' . ($page - 1) * $limit . ' LIMIT ' . $limit;

        $animeResult = static::$connection->executeStatement($sql, $parameters);
        $countResult = static::$connection->executeStatement($sqlCount, $parameters);

        return [
            'data' => array_map(fn($data): Anime => new Anime($data), $animeResult),
            'totalPage' => (int)ceil($countResult[0]['count'] / $limit),
            'count' => $countResult[0]['count']
        ];
    }

    public static function create(array $data): int
    {
        $columns = array_keys($data);
        $values = array_values($data);

        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO anime (" . implode(', ', $columns) . ") VALUES (" . str_repeat('?, ', count($values) - 1) . "?)",
            $values
        );

        return static::$connection->rowCount();
    }

    public static function remove(int $id): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement('DELETE FROM anime WHERE id = :id;', ['id' => $id]);

        return static::$connection->rowCount();
    }

    public static function update(int $id, array $data): int
    {
        $columns = array_keys($data);
        $values = array_values($data);

        /* update values */
        $update_set = '';
        foreach ($columns as $col) {
            $update_set .= "$col = ?, ";
        }
        $update_set = substr($update_set, 0, -2);

        /* execute query, update values */
        static::$connection->executeStatement(
            "UPDATE anime SET $update_set WHERE id = ?",
            array_merge($values, array($id))
        );

        return static::$connection->rowCount();
    }

    public static function delete(int $id): int
    {
        static::$connection->executeStatement("DELETE FROM anime WHERE id = :id", [
            'id' => $id
        ]);

        return static::$connection->rowCount();
    }
}
