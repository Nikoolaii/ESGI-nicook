<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/account', name: 'app_users')]
    public function index(): Response
    {
        $favorites = $this->getUser()->getFavorite();

        return $this->render('account/index.html.twig', [
            'controller_name' => 'UsersController',
            'PageName' => 'Mes favoris',
            'favorites' => $favorites,
        ]);
    }
}
