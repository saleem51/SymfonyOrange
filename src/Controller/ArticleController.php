<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article, [
            'codePostal' => '10000'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $article->setDescription($form->get('description')->getData());
            $article->setDesignation($form->get('designation')->getData());
            $article->setFournisseur($form->get('fournisseur')->getData());
            $article->setPrix($form->get('prix')->getData());
            $article->setQuantiteDisponible($form->get('quantiteDisponible')->getData());

            $manager->persist($article);
            $manager->flush();
        }

        return $this->render('article/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
