<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\UserRepository;
use App\Repository\FormationRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationsController extends AbstractController
{
    /**
     * @Route("/dashboard/formations", name="dashboard_formations")
     */
    public function index(FormationRepository $repoFormations, UserRepository $repoUsers)
    {

        $formations = $repoFormations->findAll();
        $users = $repoUsers->findAll();
        
        return $this->render('dashboard/formations/index.html.twig', [
            'controller_name' => 'FormationsController',
            'formations' => $formations,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/formations/new", name="dashboard_formations_create")
     * @Route("/dashboard/formations/{id}/edit", name="dashboard_formations_edit")
     */
    public function form(Formation $formation = null, Request $request, ObjectManager $manager, UserRepository $repoUsers) {
        
        $users = $repoUsers->findAll();

        if(!$formation) {
            $formation = new Formation();
        }

        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($formation);
            $manager->flush();

            return $this->redirectToRoute('dashboard_formations');
        }

        return $this->render('dashboard/formations/create.html.twig', [
            'formFormation' => $form->createView(),
            'editMode' => $formation->getId() !== null,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/formations/{id}/supprimer", name="dashboard_formations_delete")
     */
    public function delete(Formation $formation, Request $request, ObjectManager $manager) {

        $manager->remove($formation);
        $manager->flush();

        return $this->redirectToRoute('dashboard_formations');

    }

}