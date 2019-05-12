<?php

namespace App\Controller;

use App\Entity\Technologie;
use App\Form\TechnologieType;
use App\Repository\UserRepository;
use App\Repository\TechnologieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnologiesController extends AbstractController
{
    /**
     * @Route("/dashboard/technologies", name="dashboard_technologies")
     */
    public function index(TechnologieRepository $repoTechnologies, UserRepository $repoUsers)
    {

        $technologies = $repoTechnologies->findAll();
        $users = $repoUsers->findAll();

        return $this->render('dashboard/technologies/index.html.twig', [
            'controller_name' => 'TechnologiesController',
            'technologies' => $technologies,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/technologies/new", name="dashboard_technologies_create")
     * @Route("/dashboard/technologies/{id}/edit", name="dashboard_technologies_edit")
     */
    public function form(Technologie $technologie = null, Request $request, ObjectManager $manager, UserRepository $repoUsers) {
        
        $users = $repoUsers->findAll();
        
        if(!$technologie) {
            $technologie = new Technologie();
        }

        $form = $this->createForm(TechnologieType::class, $technologie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($technologie);
            $manager->flush();

            return $this->redirectToRoute('dashboard_technologies');
        }

        return $this->render('dashboard/technologies/create.html.twig', [
            'formTechnologie' => $form->createView(),
            'editMode' => $technologie->getId() !== null,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/technologies/{id}/supprimer", name="dashboard_technologies_delete")
     */
    public function delete(Technologie $technologie, Request $request, ObjectManager $manager) {

        $manager->remove($technologie);
        $manager->flush();

        return $this->redirectToRoute('dashboard_technologies');

    }


}

