<?php


namespace App\Controller;

use App\Model\ExperienceManager;
use App\Model\PreferenceManager;

class HumanController extends AbstractController
{
    public function view()
    {
        $prefUser = ['not_garlic','not_ginger','not_allergy']; //récupère un array avec les préférences de l'humain
        $experienceManager = new ExperienceManager();
        $preferenceManager = new PreferenceManager();
        $views = null;
        $keyCount = 0;

        foreach ($prefUser as $pref) {
            $id = $preferenceManager->selectOneIdByName($pref);
            $experiences = $experienceManager->selectByPrefId($id['id']);
            foreach ($experiences as $experience) {
                $views[$keyCount] = $experience;
                $keyCount++;
            }
        }

        return json_encode($views);
    }
}
