<?php

namespace App\Controller\Movie;

use App\Repository\MediaRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MediaController extends AbstractController
{
    #[Route('/movie', name: 'page_media')]
    public function movie(
        MovieRepository $movieRepository
    ): Response
    {
        $movies = $movieRepository->findAll();
        return $this->render('media/index.html.twig', [
            'movie' => $movies
        ]);
    }
}
