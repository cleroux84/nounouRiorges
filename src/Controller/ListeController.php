<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(User::class);

        $listeUsers = $repo->findAll();
        return $this->render('liste/index.html.twig', [
            'controller_name' => 'ListeController',
            
            'listeUsers' => $listeUsers,
        ]);
    }
}
