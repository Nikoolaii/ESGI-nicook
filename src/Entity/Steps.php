<?php

namespace App\Entity;

use App\Repository\StepsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StepsRepository::class)]
class Steps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'steps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?recipes $recipe_id = null;

    #[ORM\Column]
    private ?int $stepNb = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipeId(): ?recipes
    {
        return $this->recipe_id;
    }

    public function setRecipeId(?recipes $recipe_id): static
    {
        $this->recipe_id = $recipe_id;

        return $this;
    }

    public function getStepNb(): ?int
    {
        return $this->stepNb;
    }

    public function setStepNb(int $stepNb): static
    {
        $this->stepNb = $stepNb;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
