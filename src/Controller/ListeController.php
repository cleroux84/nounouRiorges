<?php

namespace App\Controller;

use App\Entity\Profils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeController extends AbstractController
{
    
    /**
     * @Route("/liste", name="liste")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Profils::class);
        $listeUsers = $repo->findAll(); 
        $listeUsersByPlaceDispo = $repo->findBy(array(), array('placeDispo'=>'desc'));  
        $listeUsersByTarif = $repo->findBy(array(), array('tarifHoraire'=>'asc')); 
        $listeUsersByAgrement = $repo->findBy(array(), array('AgrementDate'=>'asc')); 

        return $this->render('liste/index.html.twig', [
            'controller_name' => 'ListeController',
            'listeUsers' => $listeUsers,
            'listeUserByPlaceDispo' => $listeUsersByPlaceDispo,
            'listeUsersByTarif' => $listeUsersByTarif,
            'listeUsersByAgrement' => $listeUsersByAgrement,
        ]);
    }

    
}

