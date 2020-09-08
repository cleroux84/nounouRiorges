<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Profils;
use App\Form\ProfilsType;
use App\Repository\ProfilsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/profils")
 */
class ProfilsController extends AbstractController
{
    /**
     * @Route("/", name="profils_index", methods={"GET","POST"})
     */
    public function index(ProfilsRepository $profilsRepository): Response
    {
        return $this->render('profils/index.html.twig', [
            'profils' => $profilsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="profils_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $profil = new Profils();
        $form = $this->createForm(ProfilsType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($profil);
            $entityManager->flush();

            return $this->redirectToRoute('profils_index');
        }

        return $this->render('profils/new.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="profils_show", methods={"GET", "POST"})
     */
    public function show(User $user, Profils $profil): Response
    {
        $profilId = $profil->getUser()->getId();
   
        return $this->render('profils/show.html.twig', [
            'profilId' => $profilId,
            'profil' => $profil,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="profils_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Profils $profil): Response
    {
        $form = $this->createForm(ProfilsType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profils_index');
        }

        return $this->render('profils/edit.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="profils_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Profils $profil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($profil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profils_index');
    }
}
