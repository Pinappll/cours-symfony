<?php

namespace App\Controller\Movie;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\MediaRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class CategroyController extends AbstractController
{
    #[Route('/category/{id}', name: 'page_category')]
    public function category(
        Categorie $categorie,
        MediaRepository $mediaRepository,
    ): Response
    {
        $medias = $mediaRepository->findByCategoryWithPagination(
            category: $categorie,
            currentPage: 1,
            maxPerPage: 9,
        );
        return $this->render('movie/category.html.twig',
            [
                'categorie' => $categorie,
                'medias' => $medias
            ]
        );
    }

    #[Route('/discover', name: 'page_discover')]
    public function discover(
        MovieRepository $movieRepository,
        CategorieRepository $categorieRepository
    )
    {
        $movies = $movieRepository->findAll();
        $categories = $categorieRepository->findAll();
        return $this->render('movie/discover.html.twig',
            [
                'movies' => $movies,
                'categories' => $categories
            ]
        );
    }
}
