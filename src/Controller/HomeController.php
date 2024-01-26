<?php

namespace App\Controller;

use App\Entity\Recipes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $recipes = $entityManager->getRepository(Recipes::class)->findBy([], ['createdAt' => 'DESC'], 4);
        $recipeWithoutMain = array_shift($recipes);

        $mainRecipe = $entityManager->getRepository(Recipes::class)->find(1);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'MainRecipe' => $mainRecipe,
            'Recipes' => $recipes,
            'PageName' => 'Accueil',
        ]);
    }
}
