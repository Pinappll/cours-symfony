<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    #[Route('/', name: 'page_homepage')]
    public function index(
        CategorieRepository $categorieRepository
    )
    {


        return $this->render('index.html.twig',
            [
                'categories' => $categorieRepository->findAll()
            ]
        );
    }


}
