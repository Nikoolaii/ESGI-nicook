<?php

namespace App\Controller;

use App\Entity\Recipes;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/search', name: 'app_search')]
    public function search(EntityManagerInterface $entityManager): Response
    {
        $params = $_GET['query'];
        $recipes = $entityManager->getRepository(Recipes::class)->findBySearch($params);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Recipes' => $recipes,
            'PageName' => 'Recherche',
        ]);
    }

    #[Route('/recipe/{id}', name: 'app_recipe')]
    public function recipe(EntityManagerInterface $entityManager, $id): Response
    {
        $recipe = $entityManager->getRepository(Recipes::class)->find($id);

        return $this->render('home/recipe.html.twig', [
            'controller_name' => 'HomeController',
            'Recipe' => $recipe,
            'PageName' => 'Recette n°' . $id,
        ]);
    }

    #[Route('/recipes', name: 'app_recipes')]
    public function recipes(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $entityManager->getRepository(Recipes::class)->findBy([], ['createdAt' => 'DESC']),
            $request->query->get('page', 1),
            10
        );

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Recipes' => $pagination,
            'PageName' => 'Recettes',
        ]);
    }
}
