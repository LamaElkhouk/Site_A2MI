<?php

namespace App\Entity;

use App\Repository\IntroductionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntroductionRepository::class)]
class Introduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $sous_description = [];

    #[ORM\Column(length: 255)]
    private ?string $nom_bouton = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien_bouton = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSousDescription(): array
    {
        return $this->sous_description;
    }

    public function setSousDescription(?array $sous_description): self
    {
        $this->sous_description = $sous_description;

        return $this;
    }

    public function getNomBouton(): ?string
    {
        return $this->nom_bouton;
    }

    public function setNomBouton(string $nom_bouton): self
    {
        $this->nom_bouton = $nom_bouton;

        return $this;
    }

    public function getLienBouton(): ?string
    {
        return $this->lien_bouton;
    }

    public function setLienBouton(string $lien_bouton): self
    {
        $this->lien_bouton = $lien_bouton;

        return $this;
    }
}
