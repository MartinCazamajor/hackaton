<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function signIn()
    {
        $table = file_get_contents('php://input');
        $jsonObject = json_decode($table, true);
        var_dump($jsonObject);
        error_log(print_r($jsonObject, true));
        //var_dump($_POST);
        error_log(print_r($_POST, true));
        var_dump($_POST);
        $userManager = new UserManager();
        return $userManager->add($_POST);
        //die();
    }

    public function logIn()
    {
        return ('logIn');
    }
}
