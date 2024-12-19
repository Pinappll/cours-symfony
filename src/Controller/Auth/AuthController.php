<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{
    #[Route('/loginPerso', name: 'login')]
    public function login()
    {
        return $this->render('auth/login.html.twig');
    }

    #[Route('/register', name: 'register')]
    public function register()
    {
        return $this->render('auth/register.html.twig');
    }

    #[Route('/forgot-password', name: 'forgot_password')]
    public function forgotPassword()
    {
        return $this->render('auth/forgot.html.twig');
    }

    #[Route('/reset-password', name: 'reset_password')]
    public function resetPassword()
    {
        return $this->render('auth/reset.html.twig');
    }
}
