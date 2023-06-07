<?php

namespace App\Controller;

use App\Entity\Assure;
use App\Form\AssureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/assure')]
class AssureController extends AbstractController
{
    #[Route('/', name: 'app_assure_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $assures = $entityManager
            ->getRepository(Assure::class)
            ->findAll();

        return $this->render('assure/index.html.twig', [
            'assures' => $assures,
        ]);
    }

    #[Route('/new', name: 'app_assure_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $assure = new Assure();
        $form = $this->createForm(AssureType::class, $assure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($assure);
            $entityManager->flush();

            return $this->redirectToRoute('app_assure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('assure/new.html.twig', [
            'assure' => $assure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_assure_show', methods: ['GET'])]
    public function show(Assure $assure): Response
    {
        return $this->render('assure/show.html.twig', [
            'assure' => $assure,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_assure_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Assure $assure, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AssureType::class, $assure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_assure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('assure/edit.html.twig', [
            'assure' => $assure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_assure_delete', methods: ['POST'])]
    public function delete(Request $request, Assure $assure, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assure->getId(), $request->request->get('_token'))) {
            $entityManager->remove($assure);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_assure_index', [], Response::HTTP_SEE_OTHER);
    }
}
