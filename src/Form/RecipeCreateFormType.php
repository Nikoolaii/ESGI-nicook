<?php

namespace App\Form;

use App\Entity\Ingredients;
use App\Entity\Recipes;
use App\Entity\Tools;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('img_link')
            ->add('createdAt')
            ->add('user_id', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'id',
            ])
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('ingredients', EntityType::class, [
                'class' => Ingredients::class,
                'choice_label' => 'id',
                'multiple' => true,
                'allow_add' => true,
            ])
            ->add('tools', EntityType::class, [
                'class' => Tools::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('steps', EntityType::class, [
                'class' => Steps::class,
                'choice_label' => 'id',
                'multiple' => true,
                'allow_add' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}
