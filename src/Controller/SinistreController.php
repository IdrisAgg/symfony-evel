<?php

namespace App\Controller;

use App\Entity\Sinistre;
use App\Form\SinistreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sinistre')]
class SinistreController extends AbstractController
{
    #[Route('/', name: 'app_sinistre_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $sinistres = $entityManager
            ->getRepository(Sinistre::class)
            ->findAll();

        return $this->render('sinistre/index.html.twig', [
            'sinistres' => $sinistres,
        ]);
    }

    #[Route('/new', name: 'app_sinistre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sinistre = new Sinistre();
        $form = $this->createForm(SinistreType::class, $sinistre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sinistre);
            $entityManager->flush();

            return $this->redirectToRoute('app_sinistre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sinistre/new.html.twig', [
            'sinistre' => $sinistre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sinistre_show', methods: ['GET'])]
    public function show(Sinistre $sinistre): Response
    {
        return $this->render('sinistre/show.html.twig', [
            'sinistre' => $sinistre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sinistre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sinistre $sinistre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SinistreType::class, $sinistre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sinistre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sinistre/edit.html.twig', [
            'sinistre' => $sinistre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sinistre_delete', methods: ['POST'])]
    public function delete(Request $request, Sinistre $sinistre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sinistre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sinistre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sinistre_index', [], Response::HTTP_SEE_OTHER);
    }
}
