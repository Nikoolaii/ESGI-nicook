<?php

namespace App\Form;

use App\Entity\Recipes;
use App\Entity\Tools;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, ['attr' => ['class' => 'form-control'], 'label' => 'Titre'])
            ->add('description', null, ['attr' => ['class' => 'form-control p-2'], 'label' => 'Description'])
            ->add('recipeImage', FileType::class, [
                'label' => 'Image (JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Choisissez une image',
                ],
            ])
            ->add('tools', EntityType::class, [
                'class' => Tools::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'label' => 'Ustensiles (CTRL + clic pour en sélectionner plusieurs)',
                'attr' => [
                    'class' => 'form-select form-select-md mb-3',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}
