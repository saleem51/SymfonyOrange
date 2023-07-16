<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FournisseurController extends AbstractController
{
    #[Route('/fournisseur', name: 'app_fournisseur')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $fournisseur = new Fournisseur();

        $form = $this->createForm(FournisseurType::class, $fournisseur);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $fournisseur->setLibelle($form->get('libelle')->getData());
            $fournisseur->setAdresse($form->get('adresse')->getData());

            $manager->persist($fournisseur);

            $manager->flush();
        }
        return $this->render('fournisseur/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
