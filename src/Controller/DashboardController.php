<?php

namespace App\Controller;

use App\Repository\ProjetRepository;
use App\Repository\FormationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\TechnologieRepository;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(ProjetRepository $repoProjets, TechnologieRepository $repoTechnologies, FormationRepository $repoFormations, ExperienceRepository $repoExperiences, UserRepository $repoUsers)
    {

        $projets = $repoProjets->findAll();
        $technologies = $repoTechnologies->findAll();
        $formations = $repoFormations->findAll();
        $experiences = $repoExperiences->findAll();
        $users = $repoUsers->findAll();

        return $this->render('dashboard/home.html.twig', [
            'projets' => $projets,
            'technologies' => $technologies,
            'formations' => $formations,
            'experiences' => $experiences,
            'users' => $users
        ]);
    }

}