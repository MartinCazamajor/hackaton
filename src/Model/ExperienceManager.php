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

    public function addExperience(array $post)
    {
        $query = "INSERT INTO experience (title,description,img) VALUES (:title, :description, :img)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':title', $post['title'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $post['description'], \PDO::PARAM_STR);
        $statement->bindValue(':img', $post['img'], \PDO::PARAM_STR);
        $statement->execute();
        return 'ok';
    }

    public function viewAllExperience()
    {
        $query = "SELECT e.title, e.description, e.img 
            FROM experience e";
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function viewAllExperiencebyId(int $id)
    {
        $query = "SELECT e.title, e.description, e.img 
            FROM experience e 
            JOIN user u ON e.user_id = u.id
            WHERE user_id = $id";
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function viewOneExperiencebyId(int $id)
    {
        $query = "SELECT e.title, e.description, e.img
            FROM experience e 
            WHERE e.id = $id";
        return $this->pdo->query($query)->fetch(\PDO::FETCH_ASSOC);
    }

    public function changeAvailable($id)
    {
        $query = "UPDATE experience e SET available = :no WHERE e.id = $id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':no', 'no', \PDO::PARAM_STR);
        $statement->execute();
    }
}
