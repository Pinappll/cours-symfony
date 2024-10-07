<?php

namespace App\Controller\Movie;

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
    public function discover()
    {
        return $this->render('movie/discover.html.twig');
    }
}
