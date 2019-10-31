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
        $experienceManager = new ExperienceManager();
        $viewExperience = $experienceManager->viewAllExperiencebyId($_POST['id']);
        header("Access-Control-Allow-Origin: *");
        return json_encode($viewExperience);
    }
}
