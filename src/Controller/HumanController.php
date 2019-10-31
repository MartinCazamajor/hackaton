<?php


namespace App\Controller;

use App\Model\ExperienceManager;
use App\Model\PreferenceManager;
use App\Model\StatusManager;

class HumanController extends AbstractController
{
    public function view()
    {
        $experienceManager = new ExperienceManager();
        $preferenceManager = new PreferenceManager();
        $views = null;
        $keyCount = 0;

        $userId = $_POST['id'];

        $prefUser = $preferenceManager->selectNameForUserId($userId);

        foreach ($prefUser as $pref) {
            $id = $preferenceManager->selectOneIdByName($pref['name']);
            $experiences = $experienceManager->selectByPrefId($id['id']);
            foreach ($experiences as $experience) {
                $views[$keyCount] = $experience;
                $keyCount++;
            }
        }
        header("Access-Control-Allow-Origin: *");
        return json_encode($views);
    }

    public function choose()
    {
        $id = $_POST['id'];
        $experienceManager = new ExperienceManager();
        $experienceManager->changeAvailable($id);
        $viewOneExperience = $experienceManager->viewOneExperiencebyId($id);
        header("Access-Control-Allow-Origin: *");
        return json_encode($viewOneExperience);
    }

    public function status()
    {
        $id = $_POST['id'];
        $statusManager = new PreferenceManager();
        $status = $statusManager->selectNameForUserId($id);
        header("Access-Control-Allow-Origin: *");
        return json_encode($status);
    }
}
