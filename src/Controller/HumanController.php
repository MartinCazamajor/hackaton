<?php


namespace App\Controller;

use App\Model\ExperienceManager;
use App\Model\PreferenceManager;

class HumanController extends AbstractController
{
    public function view()
    {
        $experienceManager = new ExperienceManager();
        $preferenceManager = new PreferenceManager();
        $views = null;
        $keyCount = 0;

        $userId = 5; //needs to be the json_decode from the front

        $prefUser = $preferenceManager->selectNameForUserId($userId);
        var_dump($prefUser);

        foreach ($prefUser as $pref) {
            $id = $preferenceManager->selectOneIdByName($pref['name']);
            $experiences = $experienceManager->selectByPrefId($id['id']);
            foreach ($experiences as $experience) {
                $views[$keyCount] = $experience;
                $keyCount++;
            }
        }
        var_dump($views);
        return json_encode($views);
    }
}
