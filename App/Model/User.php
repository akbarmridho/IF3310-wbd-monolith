<?php

namespace App\Model;

use Core\App;
use Core\Base\Model;
use Core\Database\Connection;
use DateTime;

/**
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $bio
 * @property string $role
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class User extends Model
{
    protected array $attributes = [
        'id',
        'name',
        'username',
        'password',
        'bio',
        'role',
        'created_at',
        'updated_at'
    ];

    protected array $datetimeAttributes = [
        'created_at',
        'updated_at'
    ];

    public static function findById(int $id): null|User
    {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $result = $connection->executeStatement('SELECT * FROM User_Data WHERE id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return new User($result[0]);
    }

    public static function findByUsername(string $username): null|User
    {
        /* execute query, fetch one row */
        $result = static::$connection->executeStatement('SELECT * FROM User_Data WHERE username = :username', ['username' => $username]);
        if (empty($result)) {
            return null;
        }

        return new User($result[0]);
    }

    public static function create(array $data): int
    {
        $columns = array_keys($data);
        $values = array_values($data);

        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO user_data (" . implode(', ', $columns) . ") VALUES (" . str_repeat('?, ', count($values) - 1) . "?)",
            $values
        );

        return static::$connection->rowCount();
    }

    public static function getStatistics(int $id): array
    {
        $result = [
            'wishlist' => 0,
            'watched' => 0,
            'watching' => 0
        ];

        $userWatch = static::$connection->executeStatement(
            'SELECT COUNT(*) as count, status
                FROM user_anime
                WHERE user_id = :id
                GROUP BY status', [
            'id' => $id
        ]);

        foreach ($userWatch as $status) {
            $result[strtolower($status['status'])] = $status['count'];
        }

        $avgRating = static::$connection->executeStatement('SELECT AVG(rating) as avg FROM review WHERE user_id = :id', ['id' => $id]);
        $result['mean_score'] = $avgRating[0]['avg'];

        return $result;
    }

    public static function remove(int $id): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement('DELETE FROM user_data WHERE id = :id;', ['id' => $id]);

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
            "UPDATE user_data SET $update_set WHERE id = ?",
            array_merge($values, array($id))
        );

        return static::$connection->rowCount();
    }

    public static function count(): int
    {
        $result = static::$connection->executeStatement("SELECT COUNT(*) as count FROM user_data");

        return $result[0]['count'];
    }

    public function isPremium(): bool
    {
        // todo implement this
        return true;
    }
}

