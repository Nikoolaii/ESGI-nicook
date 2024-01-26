<?php

namespace App\Entity;

use App\Repository\RecipesIngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipesIngredientRepository::class)]
class RecipesIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: recipes::class, inversedBy: 'recipesIngredients')]
    private Collection $recipe;

    #[ORM\ManyToMany(targetEntity: ingredients::class, inversedBy: 'recipesIngredients')]
    private Collection $ingredient;

    #[ORM\Column]
    private ?int $qqt = null;

    public function __construct()
    {
        $this->recipe = new ArrayCollection();
        $this->ingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, recipes>
     */
    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(recipes $recipe): static
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe->add($recipe);
        }

        return $this;
    }

    public function removeRecipe(recipes $recipe): static
    {
        $this->recipe->removeElement($recipe);

        return $this;
    }

    /**
     * @return Collection<int, ingredients>
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(ingredients $ingredient): static
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient->add($ingredient);
        }

        return $this;
    }

    public function removeIngredient(ingredients $ingredient): static
    {
        $this->ingredient->removeElement($ingredient);

        return $this;
    }

    public function getQqt(): ?int
    {
        return $this->qqt;
    }

    public function setQqt(int $qqt): static
    {
        $this->qqt = $qqt;

        return $this;
    }
}
