<?php

namespace App\Controller;

use App\Entity\Intervention;
use App\Entity\Equipment;
use App\Entity\Observation;
use App\Form\InterventionType;
use App\Repository\InterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/intervention")
 */
class InterventionController extends AbstractController
{
    /**
     * @Route("/", name="intervention_index", methods={"GET"})
     */
    public function index(InterventionRepository $interventionRepository): Response
    {
        return $this->render('intervention/index.html.twig', [
            'interventions' => $interventionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="intervention_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $intervention = new Intervention();

        $form = $this->createForm(InterventionType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($intervention);
            $entityManager->flush();

            return $this->redirectToRoute('intervention_index');
        }

        return $this->render('intervention/new.html.twig', [
            'intervention' => $intervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="intervention_show", methods={"GET"})
     */
    public function show(Intervention $intervention): Response
    {
        return $this->render('intervention/show.html.twig', [
            'interventions' => $intervention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="intervention_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Intervention $intervention): Response
    {
        $form = $this->createForm(InterventionType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervention_index');
        }

        return $this->render('intervention/edit.html.twig', [
            'intervention' => $intervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="intervention_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Intervention $intervention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$intervention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($intervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('intervention_index');
    }

     /**
     * @Route("/{id}/intervention", name="client_index_filter")
     */
    public function filter($id ,InterventionRepository $interventionRepository): Response
    {
        $interventions = $interventionRepository->findBy(['status' => $id]);

        dump($interventions);

        return $this->render('intervention/index.html.twig', [
            // 'interventions' => $interventionRepository->filter($id),
            'interventions' => $interventions,
        ]);
    }



}
