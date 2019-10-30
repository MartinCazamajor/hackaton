<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    const TABLE = 'user';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function add(array $post)
    {
        $query = "INSERT INTO user (username,pass,type_id) VALUES (:username, :pass, :type_id)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':username', $post['username'], \PDO::PARAM_STR);
        $statement->bindValue(':pass', $post['pass'], \PDO::PARAM_STR);
        $statement->bindValue(':type_id', $post['gender'], \PDO::PARAM_INT);
        $statement->execute();
        return 'ok';
    }
}
