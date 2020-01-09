<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ObservationController extends AbstractController
{
    /**
     * @Route("/observation", name="observation")
     */
    public function index()
    {
        return $this->render('observation/index.html.twig', [
            'controller_name' => 'ObservationController',
        ]);
    }
}
