<?php

namespace App\Controller;

use App\Entity\Plante;
use App\Form\PlanteType;
use App\Repository\PlanteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


#[Route('/plante')]
class PlanteController extends AbstractController
{
    #[Route('/', name: 'app_plante_index', methods: ['GET'])]
    public function index(PlanteRepository $planteRepository): Response
    {
        return $this->render('plante/index.html.twig', [
            'plantes' => $planteRepository->findAll(),
        ]);
    }

    #[Route('/about', name: 'app_about', methods: ['GET'])]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route('/home', name: 'app_home', methods: ['GET'])]
    public function homepage(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/contact', name: 'app_contact', methods: ['GET'])]
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }

    #[Route('/front', name: 'app_plante_index_front', methods: ['GET'])]
    public function indexFront(PlanteRepository $planteRepository): Response
    {
        return $this->render('plante/indexFront.html.twig', [
            'plantes' => $planteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_plante_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $plante = new Plante();
        $form = $this->createForm(PlanteType::class, $plante);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $pictureFile = $form['Picture']->getData();
            if ($pictureFile) {
                $originalFilename = pathinfo($pictureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $pictureDirectory = $this->getParameter('public_picture_plantes_directory');
                // Move the file to the desired directory
                try {
                    $pictureFile->move(
                        $pictureDirectory,
                        $originalFilename
                    );
                } catch (FileException $e) {
                    // Handle file upload error
                }
                // Update the 'Picture' attribute of the Plante entity with the file name
                $plante->setPicture($originalFilename);
            }
    
            $entityManager->persist($plante);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_plante_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('plante/new.html.twig', [
            'plante' => $plante,
            'form' => $form,
        ]);
    }


    #[Route('front/{id}', name: 'app_plante_show_front', methods: ['GET'])]
    public function show1(Plante $plante): Response
    {
        return $this->render('plante/show1.html.twig', [
            'plante' => $plante,
        ]);
    }

    
    #[Route('/{id}', name: 'app_plante_show', methods: ['GET'])]
    public function show(Plante $plante): Response
    {
        return $this->render('plante/show.html.twig', [
            'plante' => $plante,
        ]);
    }

    
    #[Route('/{id}/edit', name: 'app_plante_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Plante $plante, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlanteType::class, $plante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_plante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plante/edit.html.twig', [
            'plante' => $plante,
            'form' => $form,
        ]);
    }


    
    #[Route('/{id}', name: 'app_plante_delete', methods: ['POST'])]
    public function delete(Request $request, Plante $plante, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plante->getId(), $request->request->get('_token'))) {
            $entityManager->remove($plante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_plante_index', [], Response::HTTP_SEE_OTHER);
    }
}
