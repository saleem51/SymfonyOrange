<?php

namespace App\Controller;

use App\Repository\AdresseRepository;
use App\Repository\FournisseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, AdresseRepository $adresseRepository): Response
    {
        //$translated = $translator->trans('Test of symfony');

        $adresses = $adresseRepository->findByAddress("10000");

        //$fournisseurs =
        return $this->render('home/index.html.twig', [
            'adresses' => $adresses,
        ]);
    }
}
