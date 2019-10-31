<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function signIn()
    {
        $userManager = new UserManager();
        header("Access-Control-Allow-Origin: *");
        if (empty($userManager->selectOneByName($_POST['username']))) {
            $userManager->add($_POST);
        } else {
            return json_encode(false);
        }
        $user = $userManager->selectOneByName($_POST['username']);
        return json_encode($user);
    }

    public function logIn()
    {
        $userManager = new UserManager();
        $user = $userManager->selectOneByName($_POST['username']);

        header("Access-Control-Allow-Origin: *");
        if (empty($user)) {
            return json_encode('username incorrect');
        } elseif ($user['pass'] != $_POST['pass']) {
            return json_encode('password incorrect');
        } else {
            return json_encode($user);
        }
    }
}
