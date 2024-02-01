<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
use App\Entity\RecipeIngredient;
use App\Entity\Recipes;
use App\Entity\Steps;
use App\Entity\Tools;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new Users();
        $user->setEmail('nikolai@gmail.com');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'aaa111'));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $recipe1 = new Recipes();
        $recipe1->setTitle('Poulet rôti');
        $recipe1->setDescription('Un poulet rôti, c\'est toujours un régal !');
        $recipe1->setImgLink('1.jpeg');
        $recipe1->setCreatedAt(new \DateTimeImmutable());
        $recipe1->setUserId($user);
        $manager->persist($recipe1);

        $recipe2 = new Recipes();
        $recipe2->setTitle('Pâtes à la carbonara');
        $recipe2->setDescription('Un classique de la cuisine italienne !');
        $recipe2->setImgLink('2.jpeg');
        $recipe2->setCreatedAt(new \DateTimeImmutable());
        $recipe2->setUserId($user);
        $manager->persist($recipe2);

        $step = new Steps();
        $step->setDescription('Préchauffer le four à 180°C (thermostat 6).');
        $step->setStepNb(1);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Laver le poulet et le sécher avec du papier absorbant.');
        $step->setStepNb(2);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Le saler et le poivrer à l\'intérieur et à l\'extérieur.');
        $step->setStepNb(3);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Le mettre dans un plat allant au four.');
        $step->setStepNb(4);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Le badigeonner de beurre fondu.');
        $step->setStepNb(5);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Enfourner pendant 1h30.');
        $step->setStepNb(6);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Pendant ce temps, préparer les pommes de terre.');
        $step->setStepNb(7);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Les laver et les couper en deux.');
        $step->setStepNb(8);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Les mettre dans un plat allant au four.');
        $step->setStepNb(9);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Les arroser d\'huile d\'olive.');
        $step->setStepNb(10);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Les saler et les poivrer.');
        $step->setStepNb(11);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Les mettre au four pendant 1h30.');
        $step->setStepNb(12);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Servir le poulet avec les pommes de terre.');
        $step->setStepNb(13);
        $step->setRecipeId($recipe1);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Découper du parmesan en copeaux.');
        $step->setStepNb(1);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Faire cuire les pâtes dans une casserole d\'eau bouillante salée.');
        $step->setStepNb(2);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Pendant ce temps, faire revenir les lardons dans une poêle.');
        $step->setStepNb(3);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Dans un saladier, mélanger les jaunes d\'oeufs, la crème fraîche et le parmesan.');
        $step->setStepNb(4);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Saler et poivrer.');
        $step->setStepNb(5);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Quand les pâtes sont cuites, les égoutter et les mettre dans un plat.');
        $step->setStepNb(6);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Ajouter les lardons et la préparation.');
        $step->setStepNb(7);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $step = new Steps();
        $step->setDescription('Mélanger et servir.');
        $step->setStepNb(8);
        $step->setRecipeId($recipe2);
        $manager->persist($step);

        $ingredient = new Ingredients();
        $ingredient->setName('Poulet');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe1);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(1);
        $recipeIngredient->setUnit('unité');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Beurre');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe1);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(50);
        $recipeIngredient->setUnit('gramme');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Pommes de terre');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe1);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(1);
        $recipeIngredient->setUnit('kilogramme');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Huile d\'olive');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe1);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(2);
        $recipeIngredient->setUnit('cuillère à soupe');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Sel');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe1);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(1);
        $recipeIngredient->setUnit('pincée');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Poivre');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe1);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(1);
        $recipeIngredient->setUnit('pincée');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Parmesan');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe2);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(100);
        $recipeIngredient->setUnit('gramme');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Pâtes');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe2);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(500);
        $recipeIngredient->setUnit('gramme');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Lardons');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe2);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(200);
        $recipeIngredient->setUnit('gramme');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Jaune d\'oeuf');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe2);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(2);
        $recipeIngredient->setUnit('unité');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Sel');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe2);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(1);
        $recipeIngredient->setUnit('pincée');
        $manager->persist($recipeIngredient);

        $ingredient = new Ingredients();
        $ingredient->setName('Poivre');
        $manager->persist($ingredient);
        $recipeIngredient = new RecipeIngredient();
        $recipeIngredient->setRecipe($recipe2);
        $recipeIngredient->setIngredient($ingredient);
        $recipeIngredient->setQuantity(1);
        $recipeIngredient->setUnit('pincée');
        $manager->persist($recipeIngredient);

        $tools = new Tools();
        $tools->setName('Casserole');
        $manager->persist($tools);
        $recipe2->addTool($tools);

        $tools = new Tools();
        $tools->setName('Poêle');
        $manager->persist($tools);
        $recipe2->addTool($tools);

        $tools = new Tools();
        $tools->setName('Four');
        $manager->persist($tools);
        $recipe1->addTool($tools);

        $tools = new Tools();
        $tools->setName('Micro-ondes');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Mixeur');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Batteur');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Fouet');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Balance');
        $manager->persist($tools);
        $recipe1->addTool($tools);
        $recipe2->addTool($tools);

        $tools = new Tools();
        $tools->setName('Plat à gratin');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Plat à tarte');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Plat à cake');
        $manager->persist($tools);

        $tools = new Tools();
        $tools->setName('Plaques de cuisson');
        $manager->persist($tools);

        $manager->flush();
    }
}
