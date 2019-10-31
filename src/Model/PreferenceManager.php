<?php

namespace App\Model;

use App\Controller\AbstractController;

class PreferenceManager extends AbstractManager
{
    private const TABLE = 'preference';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectOneIdByName(string $name)
    {
        $query = "SELECT id FROM ". self::TABLE . " WHERE name='$name'";
        return $this->pdo->query($query)->fetch();
    }

    public function selectNameForUserId(int $id)
    {
        $query = "SELECT p.name
            FROM user_preference up
            JOIN preference p ON up.preference_id = p.id
            WHERE up.user_id = $id";
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function showStatus($id)
    {
        $query = "SELECT p.name 
        FROM user_preference up 
        JOIN preference p ON p.id= up.preference_id
        JOIN user u ON u.id = up.user_id
        WHERE up.user_id = $id";
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addPreference($userId, $preferenceId)
    {
        $query = "INSERT INTO user_preference (user_id,preference_id)
                    VALUES (" . $userId ."," . $preferenceId .")";
        return $this->pdo->query($query);
    }
}
