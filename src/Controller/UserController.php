<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function signIn()
    {
        $userManager = new UserManager();
        $_POST['username'] ='vlad';
        $_POST['pass']='truc';
        $_POST['gender'] = 2;
        if (!empty($userManager->selectOneByName($_POST['username']))) {
            $userManager->add($_POST);
            $checkName = ['checkName' => true];
        } else {
            $checkName = ['checkName' => false];
        }
        return json_encode($checkName);
    }
}
