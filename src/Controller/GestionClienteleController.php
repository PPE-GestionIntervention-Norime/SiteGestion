<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class GestionClienteleController extends AbstractController
{
    /**
     * @Route("/GestionClient", name="GestionClient")
     */
    public function index()
    {
        return $this->render('gestion_clientele/index.html.twig', [
            'controller_name' => 'GestionClienteleController',
        ]);
    }
}
