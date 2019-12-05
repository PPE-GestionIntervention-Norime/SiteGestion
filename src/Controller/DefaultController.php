<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
 
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
	/**
     * @Route("/gestionclient")
     */

	 public function gestionClient()
    {
        return $this->render('gestion_clientele/index.html.twig', [
            'controller_name' => 'GestionClienteleController',
        ]);
    }

	/**
     * @Route("/administration")
     */

	 public function adminitration()
    {
        return $this->render('adminitration/index.html.twig', [
            'controller_name' => 'adminitrationController',
        ]);
    }

	/**
     * @Route("/Intervention" , name="Intervention")
     */

	 public function interventionList()
    {
        return $this->render('intervention_list/index.html.twig', [
            'controller_name' => 'InterventionListController',
        ]);
    }

	/**
     * @Route("/AddIntervention" , name="AddIntervention")
     */

	 public function addIntervention()
    {
        return $this->render('add_intervention/index.html.twig', [
            'controller_name' => 'AddInterventionController',
        ]);
    }


}

