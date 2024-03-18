<?php

namespace App\Entity;

use App\Repository\PlanteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanteRepository::class)]
class Plante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;


    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Picture = null;

    #[ORM\Column(length: 255)]
    private ?string $disponibilite = null;

    #[ORM\Column(length: 255)]
    private ?string $vitamine = null;

    #[ORM\Column(length: 255)]
    private ?string $enzymes = null;

    #[ORM\Column(length: 255)]
    private ?string $mineraux = null;

    #[ORM\Column(length: 255)]
    private ?string $antioxydants = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

   

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

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

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getVitamine(): ?string
    {
        return $this->vitamine;
    }

    public function setVitamine(string $vitamine): static
    {
        $this->vitamine = $vitamine;

        return $this;
    }

    public function getEnzymes(): ?string
    {
        return $this->enzymes;
    }

    public function setEnzymes(string $enzymes): static
    {
        $this->enzymes = $enzymes;

        return $this;
    }

    public function getMineraux(): ?string
    {
        return $this->mineraux;
    }

    public function setMineraux(string $mineraux): static
    {
        $this->mineraux = $mineraux;

        return $this;
    }

    public function getAntioxydants(): ?string
    {
        return $this->antioxydants;
    }

    public function setAntioxydants(string $antioxydants): static
    {
        $this->antioxydants = $antioxydants;

        return $this;
    }
}
