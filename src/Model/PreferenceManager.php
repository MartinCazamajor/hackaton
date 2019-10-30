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
}
