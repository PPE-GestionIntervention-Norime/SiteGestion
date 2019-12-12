<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddInterventionController extends AbstractController
{
    /**
     * @Route("/add/intervention", name="add_intervention")
     */
    public function index()
    {
        return $this->render('add_intervention/index.html.twig', [
            'controller_name' => 'AddInterventionController',
        ]);
    }
}
