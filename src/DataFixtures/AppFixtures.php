<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
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

        for ($i = 0; $i < 100; $i++) {
            $recipe = new Recipes();
            $recipe->setTitle('Recipe ' . $i);
            $recipe->setDescription('Description ' . $i);
            $recipe->setImgLink('https://picsum.photos/700/300');
            $recipe->setCreatedAt(new \DateTimeImmutable());
            $recipe->setUserId($user);
            $manager->persist($recipe);

            $step = new Steps();
            $step->setStepNb(1);
            $step->setRecipeId($recipe);
            $step->setDescription('Description ' . $i);
            $manager->persist($step);

            $step = new Steps();
            $step->setStepNb(2);
            $step->setRecipeId($recipe);
            $step->setDescription('Description ' . $i);
            $manager->persist($step);

            $step = new Steps();
            $step->setStepNb(3);
            $step->setRecipeId($recipe);
            $step->setDescription('Description ' . $i);
            $manager->persist($step);

            $ingredient = new Ingredients();
            $ingredient->setName('Ingredient ' . $i);
            $ingredient->addRecipeId($recipe);
            $ingredient->setQuantity(1);
            $manager->persist($ingredient);

            $ingredient = new Ingredients();
            $ingredient->setName('Ingredient ' . $i);
            $ingredient->addRecipeId($recipe);
            $ingredient->setQuantity(2);
            $manager->persist($ingredient);

            $ingredient = new Ingredients();
            $ingredient->setName('Ingredient ' . $i);
            $ingredient->addRecipeId($recipe);
            $ingredient->setQuantity(3);
            $manager->persist($ingredient);

            $tool = new Tools();
            $tool->setName('Tool ' . $i);
            $tool->addRecipe($recipe);
            $manager->persist($tool);

            $tool = new Tools();
            $tool->setName('Tool ' . $i);
            $tool->addRecipe($recipe);
            $manager->persist($tool);

            $tool = new Tools();
            $tool->setName('Tool ' . $i);
            $tool->addRecipe($recipe);
            $manager->persist($tool);
        }

        $manager->flush();
    }
}
