<?php

namespace App\Controller;

use App\Model\ExperienceManager;
use App\Model\PreferenceManager;

class MonsterController extends AbstractController
{
    public function add()
    {
        $experience = new ExperienceManager();
        $experience->addExperience($_POST);
    }

    public function view()
    {
        $view = new ExperienceManager();
        var_dump($view->viewAllExperiencebyId(2));
        //$view->viewAllExperiencebyId($_POST['user_id']);
    }
}
