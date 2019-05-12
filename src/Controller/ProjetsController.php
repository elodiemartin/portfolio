<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetType;
use App\Repository\UserRepository;
use App\Repository\ProjetRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetsController extends AbstractController
{
    /**
     * @Route("/dashboard/projets", name="dashboard_projets")
     */
    public function index(ProjetRepository $repoProjets, UserRepository $repoUsers)
    {

        $projets = $repoProjets->findAll();
        $users = $repoUsers->findAll();

        return $this->render('dashboard/projets/index.html.twig', [
            'controller_name' => 'ProjetsController',
            'projets' => $projets,
            'users' => $users
        ]);
    
    }

    /**
     * @Route("/dashboard/projets/new", name="dashboard_projets_create")
     * @Route("/dashboard/projets/{id}/edit", name="dashboard_projets_edit")
     */
    public function form(Projet $projet = null, Request $request, ObjectManager $manager, UserRepository $repoUsers) {

        $users = $repoUsers->findAll();

        if(!$projet) {
            $projet = new Projet();
        }

        $form = $this->createForm(ProjetType::class, $projet);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($projet);
            $manager->flush();

            return $this->redirectToRoute('dashboard_projets');
        }

        return $this->render('dashboard/projets/create.html.twig', [
            'formProjet' => $form->createView(),
            'editMode' => $projet->getId() !== null,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/projets/{id}/supprimer", name="dashboard_projets_delete")
     */
    public function delete(Projet $projet, Request $request, ObjectManager $manager) {

        $manager->remove($projet);
        $manager->flush();

        return $this->redirectToRoute('dashboard_projets');
    }

}
