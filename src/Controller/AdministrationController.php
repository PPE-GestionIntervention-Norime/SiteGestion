<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EquipmentRepository;
use App\Repository\InterventionTypeRepository;
use App\Repository\TechnicianRepository;
use App\Repository\OSRepository;
use App\Repository\EquipmentIncompleteRepository;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(EquipmentRepository $equipmentRepository)
    {
        return $this->render('administration/index.html.twig', [
            'admins' => $equipmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/administration/intervention", name="intervention")
     */
    public function intervention(InterventionTypeRepository $InterventionTypeRepository)
    {
        return $this->render('administration/index.html.twig', [
            'admins' => $InterventionTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/administration/technician", name="technician")
     */
    public function technician(TechnicianRepository $TechnicianRepository)
    {
        return $this->render('administration/index.html.twig', [
            'admins' => $TechnicianRepository->findAll(),
        ]);
    }

    /**
     * @Route("/administration/os", name="os")
     */
    public function os(OSRepository $OSRepository)
    {
        return $this->render('administration/index.html.twig', [
            'admins' => $OSRepository->findAll(),
        ]);
    }

    /**
     * @Route("/administration/materialincomplete", name="materialincomplete")
     */
    public function materialincomplete(EquipmentIncompleteRepository $EquipmentIncompleteRepository)
    {
        return $this->render('administration/index.html.twig', [
            'admins' => $EquipmentIncompleteRepository->findAll(),
        ]);
    }
}
