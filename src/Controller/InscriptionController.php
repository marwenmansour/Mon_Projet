<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    
    public function index(Request $request, EntityManagerInterface $em ): Response
    {
        $utilisateur=new Utilisateur;
        $formulaire=$this->createForm(UtilisateurType::class,$utilisateur);
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            // J'insère l'utilisateur
            $em->persist($utilisateur);
            $em->flush();

            return $this->redirectToRoute('inscription');
        } else {
            return $this->render('inscription/index.html.twig', [
                'formulaire' => $formulaire->createView()
        ]);
    }
    }
  
}
