<?php

namespace App\Controller\Movie;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'page_detail_movie')]
    public function movie()
    {
        return $this->render('movie/detail.html.twig');
    }

    #[Route('/serie', name: 'page_detai_serie')]
    public function serie()
    {
        return $this->render('movie/detail_serie.html.twig');
    }
}
