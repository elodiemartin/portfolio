<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Form\ExperienceType;
use App\Repository\UserRepository;
use App\Repository\ExperienceRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExperienceController extends AbstractController
{
    /**
     * @Route("/dashboard/experience", name="dashboard_experience")
     */
    public function index(ExperienceRepository $repoExperiences, UserRepository $repoUsers)
    {
        $experiences = $repoExperiences->findAll();
        $users = $repoUsers->findAll();

        return $this->render('dashboard/experience/index.html.twig', [
            'controller_name' => 'ExperienceController',
            'experiences' => $experiences,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/experience/new", name="dashboard_experience_create")
     * @Route("/dashboard/experience/{id}/edit", name="dashboard_experience_edit")
     */
    public function form(Experience $experiences = null, Request $request, ObjectManager $manager, UserRepository $repoUsers) {

        $users = $repoUsers->findAll();

        if(!$experiences) {
            $experiences = new Experience();
        }

        $form = $this->createForm(ExperienceType::class, $experiences);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($experiences);
            $manager->flush();

            return $this->redirectToRoute('dashboard_experience');
        }

        return $this->render('dashboard/experience/create.html.twig', [
            'formExperience' => $form->createView(),
            'editMode' => $experiences->getId() !== null,
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard/experience/{id}/supprimer", name="dashboard_experience_delete")
     */
    public function delete(Experience $experiences, Request $request, ObjectManager $manager) {

        $manager->remove($experiences);
        $manager->flush();

        return $this->redirectToRoute('dashboard_experience');

    }

}
