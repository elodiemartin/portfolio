<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{   
    /**
     * @Route("/admin", name="dashboard_security_login")
     */
    public function login() {
        return $this->render('dashboard/security/login.html.twig');
    }

    /**
     * @Route("/dashboard/deconnexion", name="dashboard_security_logout")
     */
    public function logout() {}
}
