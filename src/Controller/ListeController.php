<?php

namespace App\Controller;

use App\Form\ListeType;

use App\Entity\Profils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Helper\Dumper;
use Symfony\Component\HttpFoundation\Request;


class ListeController extends AbstractController
{
    
    /**
     * @Route("/liste", name="liste")
     */
    public function index(Request $request)
    {
        $formSelect = $this->createForm(ListeType::class);
        $formSelect->handleRequest($request);
        $dataContent = $formSelect->getData();
        $data = $dataContent["selectChoices"];
        
        $listeUsers = []; 
        $repo = $this->getDoctrine()->getRepository(Profils::class);
        $listeUsers = $repo->findAll();
      
        if($formSelect->isSubmitted() && $formSelect->isValid())
        {
         
          if($data == 'placeDispo'){
            $listeUsers = $repo->findBy(array(), array('placeDispo'=>'desc'));  

          }    
          elseif($data == 'tarifHoraire')   {
            $listeUsers = $repo->findBy(array(), array('tarifHoraire'=>'asc')); 
          }    
          else{
            $listeUsers = $repo->findBy(array(), array('AgrementDate'=>'asc')); 
          }
        }    
        
          $arrayLatitude = [];
          $arrayLongitude = [];

     

        foreach ($listeUsers as $listeUser){

        $latitude = $listeUser->getLatitude();
        $longitude = $listeUser->getLongitude();
        array_push($arrayLatitude, $latitude);
        array_push($arrayLongitude, $longitude); 
        }
      
       
      return $this->render('liste/index.html.twig', [
            'formSelect' => $formSelect->createView(),
            'controller_name' => 'ListeController',
            'listeUsers' => $listeUsers,
            'arrayLatitude' => $arrayLatitude,
            'arrayLongitude' => $arrayLongitude,
        ]);
    }

    
}

