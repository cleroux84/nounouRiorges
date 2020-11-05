<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Profils;
use App\Form\ProfilsType;
use App\Repository\ProfilsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Validator\Constraints as Assert;

     

/**
 * @Route("/profils")
 */
class ProfilsController extends AbstractController
{
   
    private function saveUploadFile(UploadedFile $file, string $directory, SluggerInterface $slugger)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            $file->move(
                $directory,
                $newFilename
            );
        } catch (FileException $e) {
            $newFilename = 'error file upload';
        }

        return $newFilename;
    }


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
    // Calling Abstract API endpoint using CURL library (http://us3.php.net/curl)
       /*   $ch = curl_init('https://ipgeolocation.abstractapi.com/v1/?api_key=b3ffc41ecae94b03a1297f26a86a4b90&ip_address=172.16.238.1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $test = json_decode($data); */
      /*   dd($test); */  

        $profilId = $profil->getUser();
        $coordonneesGps = $_SERVER['REMOTE_ADDR'];
        $userId = $this->get('security.token_storage')->getToken()->getUser();      
        /*  dd($coordonneesGps); */ 
        return $this->render('profils/show.html.twig', [
            'profilId' => $profilId,
            'profil' => $profil,
            'user' => $user,
            'userId' => $userId,
            'coordonneesGps' => $coordonneesGps,
        ]);
    }

    /**
     * @Route("/{id}/pdf", name="pdf", methods={"GET","POST"})
     */
    public function toPdfAction(Profils $profil)
    {
        
        $pdfOptions = new Options();
/*         $pdfOptions->set('defaultFont', 'Arial');
 */
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
       
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('profils/pdf.html.twig', [
            'profil' => $profil,
            ]);
            
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
       
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');
       
        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
            ]);
            dd($dompdf);
    }

     /**
     * @Route("/{id}/edit", name="profils_edit", methods={"GET","POST"})
     * 
     */

    public function edit(Request $request, Profils $profil, SluggerInterface $slugger): Response
    {    
        $form = $this->createForm(ProfilsType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form->get('photoIdentite')->getData();
            if ($file) {
                $newFilename = $this->saveUploadFile(
                    $file,
                    $this->getParameter('upload_directory'),
                    $slugger
                );
                $profil->setPhotoIdentite($newFilename);
            }
            $file1 = $form->get('photo1')->getData();
            if ($file1) {
                $newFilename = $this->saveUploadFile(
                    $file1,
                    $this->getParameter('upload_directory'),
                    $slugger
                );
                $profil->setPhoto1($newFilename);
            }
            $file2 = $form->get('photo2')->getData();
            if ($file2) {
                $newFilename = $this->saveUploadFile(
                    $file2,
                    $this->getParameter('upload_directory'),
                    $slugger
                );
                $profil->setPhoto2($newFilename);
            }
            $file3 = $form->get('photo3')->getData();
            if ($file3) {
                $newFilename = $this->saveUploadFile(
                    $file3,
                    $this->getParameter('upload_directory'),
                    $slugger
                );
                $profil->setPhoto3($newFilename);
            }
            $file4 = $form->get('photo4')->getData();
            if ($file4) {
                $newFilename = $this->saveUploadFile(
                    $file4,
                    $this->getParameter('upload_directory'),
                    $slugger
                );
                $profil->setPhoto4($newFilename);
            }
            /* autoriser json */
            $url="https://new.aol.com/productsweb/subflows/ScreenNameFlow/AjaxSNAction.do?s=username&f=firstname&l=lastname";
            ini_set('user_agent', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT
            5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            $result=curl_exec($ch);
            print $result;

            $codePostal = $profil->getCodePostal();
            $ville = $profil->getVilleAdresse();
            $adresse = $profil->getNumeroRueAdresse();
           

            if($codePostal && $adresse && $ville){
               
                        $json= file_get_contents('http://nominatim.openstreetmap.org/search?format=json&limit=1&q='.$adresse.'+'.$codePostal.'+'.$ville.'');
                        $obj = json_decode($json, true);
                        
                        if($obj){
                        $latitude = $obj[0]['lat'];
                        $longitude = $obj[0]['lon'];

                        $profil->setLatitude($latitude);
                        $profil->setLongitude($longitude);
                        }
                    }

            /*  dd($profil); */

            $this->getDoctrine()->getManager()->flush();
            /*  dd($profil);  */ 
            return $this->redirectToRoute('liste');
        }


        return $this->render('profils/edit.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }
    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    /**
     * @Route("/{id}", name="profils_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Profils $profil): Response
    {
        if ($this->isCsrfTokenValid('delete' . $profil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($profil);
            $entityManager->flush();
            $this->container->get('security.token_storage')->setToken(null);
        }
              return $this->redirectToRoute('home');
    }
}
