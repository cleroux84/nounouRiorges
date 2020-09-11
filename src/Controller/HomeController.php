<?php

namespace App\Controller;

use App\Entity\Profils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        if($user === "anon."){
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }
else{
        $userId = $user->getId();
        $userMail = $user->getEmail();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'userId' => $userId,
            'userMail' => $userMail,
        ]);
    }
}
}
