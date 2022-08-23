<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashAdmin", name="app_dashboard_admin")
     */
    public function dashAdmin(): Response
    {
        return $this->render('dashboard/dashAdmin.html.twig', [
            'controller_name' => 'DashboardAdminController',
        ]);
    }

    /**
     * @Route("/dashUser", name="app_dashboard_user")
     */
    public function dashUser(): Response
    {
        return $this->render('dashboard/dashUser.html.twig', [
            'controller_name' => 'DashboardUserController',
        ]);
    }
}
