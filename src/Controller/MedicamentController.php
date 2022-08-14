<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MedicamentController extends AbstractController
{
    /**
     * @Route("/medicament", name="app_medicament")
     */
    public function index(): Response
    {
        return $this->render('medicament/index.html.twig', [
            'controller_name' => 'MedicamentController',
        ]);
    }

    /**
     * @Route("/readjson")
     * */
public function readJsonTest(){
    $projectRoot = $this->getParameter('kernel.project_dir');
    $data = file_get_contents($projectRoot.'/medicaments.json');
    return new Response($data);
}
}
