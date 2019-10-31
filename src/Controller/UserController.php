<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function signIn()
    {
        $userManager = new UserManager();
        if (!empty($userManager->selectOneByName($_POST['username']))) {
            $userManager->add($_POST);
            $checkName = true;
        } else {
            $checkName = false;
        }
        header("Access-Control-Allow-Origin: *");
        return json_encode($checkName);
    }
}
