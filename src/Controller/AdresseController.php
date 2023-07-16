<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdresseController extends AbstractController
{
    #[Route('/adresse', name: 'app_adresse')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {

        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $adresse->setAdresse1($form->get('adresse1')->getData());
            $adresse->setAdresse2($form->get('adresse2')->getData());
            $adresse->setCodePostal($form->get('codePostal')->getData());
            $adresse->setCodePostal($form->get('ville')->getData());

            $manager->persist($adresse);
            $manager->flush();

        }

        return $this->render('adresse/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
