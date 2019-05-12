<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Projet;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <=10; $i++){
            $projet = new Projet();
            $projet->setTitle("Titre du projet n°$i")
                   ->setContent("Contenu du projet n°$i")
                   ->setLink("http://elodie-martin.com/")
                   ->setPicture("http://elodie-martin.com/");

            $manager->persist($projet);

        }

        $manager->flush();
    }
}
