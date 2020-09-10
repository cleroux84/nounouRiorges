<?php

namespace App\Controller;

use App\Entity\Profils;
use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */

    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder) {
        $user = new User();
      /*   var_dump($user); */
        $profil= new Profils;

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
           
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
           
            
            $manager->persist($user);
            $manager->flush(); 
            $email = $user->getEmail();
            $nom= $user->getUsername();
            $profil-> setEmail($email);
            $profil->setUser($user);
            $profil->setNom($nom);
            $manager->persist($profil);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

        /**
         * @Route ("/connexion", name="security_login")
         */
        public function login(){
            return $this->render('security/login.html.twig');
        }
        

         /**
         * @Route ("/deconnexion", name="security_logout")
         */
        public function logout(){
            
        }
}
