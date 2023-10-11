<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        // dd($articles);
        // dd() = var dump
        return $this->render('home/home.html.twig', [
            'hello_world' => 'Hello World',
            'articles' => $articles,
        ]);
    }
    
    #[Route('/show/{id}', name: 'show')]
    // name = nom qui sera appelé dans la route
    // '/show/{id}' = on met ce que l'on veut car ce n'est pas le chemin du dossier.
    public function show(ArticleRepository $articleRepository, $id): Response
    {
        $article = $articleRepository->find($id);
        // dd() = var dump
        return $this->render('home/show.html.twig', [
            'article' => $article
        ]);
    }


}


// $articles = ArticleRepository::findAll();

// $articles = new ArticleRepository();
// ArticleRepository->findAll();

