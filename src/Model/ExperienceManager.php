<?php

namespace App\Model;

class ExperienceManager extends AbstractManager
{

    private const TABLE = 'preference';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectByPrefId(int $id)
    {
        $query = "SELECT e.title, e.description, e.img
            FROM type_preference tp
            JOIN type t ON tp.type_id = t.id
            JOIN preference p ON tp.preference_id = p.id
            JOIN user u ON u.type_id = t.id
            JOIN experience e ON e.user_id = u.id
            WHERE p.id = $id";
        $pref = $this->pdo->query($query)->fetchAll();
        return $pref;
    }
}
