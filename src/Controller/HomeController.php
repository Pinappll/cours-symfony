<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\MediaRepository;
use App\Repository\MovieRepository;
use App\Repository\SerieRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    #[Route('/', name: 'page_homepage')]
    public function index(
        MediaRepository $mediasRepository,
        CategorieRepository $categorieRepository
    )
    {
        $medias = $mediasRepository->findAll();
        return $this->render('index.html.twig',
            [
                'medias' => $medias,
                'categories' => $categorieRepository->findAll()
            ]
        );
    }

    #[Route('/movies', name: 'page_movie')]
    public function movies(
        MovieRepository $movieRepository
    )
    {
        $movies = $movieRepository->findAll();
        return $this->render('index.html.twig',
            [
                'medias' => $movies
            ]
        );
    }

    #[Route('/series', name: 'page_series')]
    public function series(
        SerieRepository $serieRepository
    )
    {
        $series = $serieRepository->findAll();
        return $this->render('index.html.twig',
            [
                'medias' => $series
            ]
        );
    }

}
