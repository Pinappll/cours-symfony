<?php

namespace App\Controller\Movie;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
class CategroyController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function category()
    {
        return $this->render('movie/category.html.twig');
    }

    #[Route('/discover', name: 'page_discover')]
    public function discover(
        MovieRepository $movieRepository,
        CategorieRepository $categoriesRepository
    )
    {
        $movies = $movieRepository->findAll();
        $categories = $categoriesRepository->findAll();
        return $this->render('movie/discover.html.twig',
            [
                'movies' => $movies,
                'categories' => $categoriesRepository->findAll()
            ]
        );
    }
}
