<?php

namespace App\DataFixtures;

use App\Entity\Recipes;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new Users();
        $user->setMail('mail@mail.com');
        $user->setPassword('password');
        $user->setName('Name');
        $manager->persist($user);
        for ($i = 0; $i < 10; $i++) {
            $recipe = new Recipes();
            $recipe->setTitle('Recipe ' . $i);
            $recipe->setDescription('Description ' . $i);
            $recipe->setImgLink('https://picsum.photos/200/300');
            $recipe->setCreatedAt(new \DateTimeImmutable());
            $recipe->setUserId($user);
            $manager->persist($recipe);
        }
        $manager->flush();
    }
}
