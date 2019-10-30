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
}
