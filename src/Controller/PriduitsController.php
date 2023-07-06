<?php

namespace App\Controller;

use App\Entity\Priduits;
use App\Form\ImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PriduitsController extends AbstractController
{
    #[Route('/priduits', name: 'app_priduits')]
    public function index(): Response
    {

        
        return $this->render('priduits/index.html.twig', [
            'controller_name' => 'PriduitsController',

        ]);
    }

    #[Route('/priduits/new', name: 'app_priduitsNew')]
    public function new(Request $request,
    EntityManagerInterface $manager
   ) : Response
   {
     $produits = new Priduits();
     $form = $this->createForm(ImageType::class, $produits);
     $form->handleRequest($request);
     if($form->isSubmitted() && $form->isValid()){
        $clinton = $form->getData();
        $manager->persist($clinton);
        $manager->flush();
        return $this->redirectToRoute('app_priduitsNew');
     }

     return $this->render('priduits/new.html.twig', [
        'form' => $form->createView()
    ]);

   }

}
