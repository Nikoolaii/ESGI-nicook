<?php

namespace App\Controller;

use App\Entity\Ingredients;
use App\Entity\RecipeIngredient;
use App\Entity\Recipes;
use App\Entity\Steps;
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
            $ingredients[] = [$ingredient->getIngredient(), $ingredient->getQuantity(), $ingredient->getUnit()];
        }

        return $this->render('recipes/recipe.html.twig', [
            'controller_name' => 'RecipesController',
            'Recipe' => $recipe,
            'Ingredients' => $ingredients,
            'PageName' => 'Recette n°' . $id,
        ]);
    }

    #[Route('/create', name: 'app_recipe_create')]
    public function recipeCreate(EntityManagerInterface $entityManager, Request $request): Response
    {
        $recipe = new Recipes();
        $form = $this->createForm(RecipeType::class, $recipe, ['attr' => ['class' => 'customForm']]);

//        Stock the image in the public folder and get the link
        $image = $form->get('recipeImage')->getData();
        if ($image) {
            $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename . '-' . uniqid() . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('recipe_image_directory'),
                $newFilename
            );
        } else {
            $newFilename = 'https://picsum.photos/700/300';
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
//          Create the recipe, save in the db and collect the id
            $data = $form->getData();
            $data->setCreatedAt(new \DateTimeImmutable());
            $data->setImgLink($newFilename);
            $entityManager->persist($data);
            $entityManager->flush();
            $recipeId = $data->getId();

//            Get all ingredients from the form
            $formData = $request->request->all();
            for ($i = 1; isset($formData['ingredient' . $i]); $i++) {
                $ingredient = [
                    'name' => $formData['ingredient' . $i],
                    'quantity' => $formData['qqt' . $i],
                    'unit' => $formData['unit' . $i],
                ];
                $ingredients[] = $ingredient;
            }

//            Create the ingredients in the db
            foreach ($ingredients as $ingredient) {
                if ($entityManager->getRepository(Ingredients::class)->findOneBy(['name' => $ingredient['name']]) === null) {
                    $newIngredient = new Ingredients();
                    $newIngredient->setName($ingredient['name']);
                    $entityManager->persist($newIngredient);
                    $entityManager->flush();
                } else {
                    $newIngredient = $entityManager->getRepository(Ingredients::class)->findOneBy(['name' => $ingredient['name']]);
                }

//            Add ingredients to the RecipeIngredient table
                $newRecipeIngredient = new RecipeIngredient();
                $newRecipeIngredient->setRecipe($entityManager->getRepository(Recipes::class)->find($recipeId));
                $newRecipeIngredient->setIngredient($newIngredient);
                $newRecipeIngredient->setQuantity($ingredient['quantity']);
                $newRecipeIngredient->setUnit($ingredient['unit']);
                $entityManager->persist($newRecipeIngredient);
                $entityManager->flush();
            }

//            Get all steps from the form
            $formData = $request->request->all();
            for ($i = 1; isset($formData['step' . $i]); $i++) {
                $step = [
                    'description' => $formData['step' . $i],
                    'order' => $i,
                ];
                $steps[] = $step;
            }

//            Create the steps in the db
            foreach ($steps as $step) {
                $newStep = new Steps();
                $newStep->setRecipeId($entityManager->getRepository(Recipes::class)->find($recipeId));
                $newStep->setDescription($step['description']);
                $newStep->setStepNb($step['order']);
                $entityManager->persist($newStep);
                $entityManager->flush();
            }

//            Collect tools from the form
            $tools = $form->get('tools')->getData();

//            Add tools to the recipe
            foreach ($tools as $tool) {
                $tool->addRecipe($recipe);
                $entityManager->persist($tool);
                $entityManager->flush();
            }


            return $this->redirectToRoute('app_recipes');
        };

        return $this->render('recipes/recipeCreate.html.twig', [
            'controller_name' => 'RecipesController',
            'PageName' => 'Ajouter une recette',
            'recipeCreateForm' => $form->createView(),
        ]);
    }

    #[Route('/add_favorite/{id}', name: 'app_recipe_add_favorite')]
    public function markFavorite(EntityManagerInterface $entityManager, $id): Response
    {
        $recipe = $entityManager->getRepository(Recipes::class)->find($id);
        $user = $this->getUser();
        $user->addFavorite($recipe);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_recipe', ['id' => $id]);
    }

    #[Route('/remove_favorite/{id}', name: 'app_recipe_remove_favorite')]
    public function removeFavorite(EntityManagerInterface $entityManager, $id): Response
    {
        $recipe = $entityManager->getRepository(Recipes::class)->find($id);
        $user = $this->getUser();
        $user->removeFavorite($recipe);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_recipe', ['id' => $id]);
    }
}
