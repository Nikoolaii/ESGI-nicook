<?php

namespace App\Controller;

use App\Entity\RecipeIngredient;
use App\Entity\Recipes;
use App\Form\RecipeCreateFormType;
use App\Form\RecipeType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipesController extends AbstractController
{
    #[Route('/recipes', name: 'app_recipes')]
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $entityManager->getRepository(Recipes::class)->findBy([], ['createdAt' => 'DESC']),
            $request->query->get('page', 1),
            12
        );

        return $this->render('recipes/recipes.html.twig', [
            'controller_name' => 'RecipesController',
            'Recipes' => $pagination,
            'PageName' => 'Recettes',
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(EntityManagerInterface $entityManager): Response
    {
        $params = $_GET['query'];
        $recipes = $entityManager->getRepository(Recipes::class)->findBySearch($params);

        return $this->render('recipes/recipe.html.twig', [
            'controller_name' => 'RecipesController',
            'Recipes' => $recipes,
            'PageName' => 'Recherche',
        ]);
    }

    #[Route('/recipe/{id}', name: 'app_recipe')]
    public function recipe(EntityManagerInterface $entityManager, $id): Response
    {
        $recipe = $entityManager->getRepository(Recipes::class)->find($id);
        $ingredientId = $entityManager->getRepository(RecipeIngredient::class)->findBy(['recipe' => $id]);

        $ingredients = [];
        foreach ($ingredientId as $ingredient) {
            $ingredients[] = $ingredient->getIngredient();
        }

        return $this->render('recipes/recipe.html.twig', [
            'controller_name' => 'RecipesController',
            'Recipe' => $recipe,
            'Ingredients' => $ingredients,
            'PageName' => 'Recette n°' . $id,
        ]);
    }

    #[Route('/create', name: 'app_recipe_create')]
    public function recipeCreate(EntityManagerInterface $entityManager, Request $request,): Response
    {
        return $this->render('recipes/recipeCreate.html.twig', [
            'controller_name' => 'RecipesController',
            'PageName' => 'Ajouter une recette',
        ]);
    }
}
