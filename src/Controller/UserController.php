<?php

namespace App\Controller;

class UserController extends AbstractController
{
    public function signIn()
    {
        $table = file_get_contents('php://input');
        $jsonObject = json_decode($table);
        var_dump($jsonObject);
        //die();
    }
}
