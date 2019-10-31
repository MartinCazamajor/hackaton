<?php

namespace App\Model;

class UserPreferenceManager extends AbstractManager
{
    const TABLE = 'user_preference';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function addPreference($userId, $preferenceId)
    {
        $query = "INSERT INTO ". self::TABLE . " (user_id,preference_id)
                    VALUES (" . $userId ."," . $preferenceId .")";
        return $this->pdo->query($query);
    }

    public function selectByUserId(int $userId)
    {
        $query = "SELECT preference_id FROM " . self::TABLE . " WHERE user_id=$userId";
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
