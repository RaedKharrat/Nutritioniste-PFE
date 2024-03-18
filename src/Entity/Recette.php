<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeDePreparation = null;

    #[ORM\Column(length: 255)]
    private ?string $Picture = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDePreparation(): ?string
    {
        return $this->typeDePreparation;
    }

    public function setTypeDePreparation(string $typeDePreparation): static
    {
        $this->typeDePreparation = $typeDePreparation;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): static
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): static
    {
        $this->ingredient = $ingredient;

        return $this;
    }
}
