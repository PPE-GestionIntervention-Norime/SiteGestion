<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InterventionListController extends AbstractController
{
    /**
     * @Route("/intervention/list", name="intervention_list")
     */
    public function index()
    {
        return $this->render('intervention_list/index.html.twig', [
            'controller_name' => 'InterventionListController',
        ]);
    }
}
