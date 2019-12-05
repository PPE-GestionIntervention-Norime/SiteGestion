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

	 public function gestionclient()
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


}

