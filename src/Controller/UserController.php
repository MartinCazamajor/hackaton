<?php

namespace App\Controller;

class UserController extends AbstractController
{
    public function signIn()
    {
        $table = file_get_contents('php://input');
        $jsonObject = json_decode($table, true);
        var_dump($jsonObject);
        error_log(print_r($jsonObject, true));

        //die();
    }
}
