<?php

namespace App\Entity;

use App\Repository\OngletsHeaderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OngletsHeaderRepository::class)]
class OngletsHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lien = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $sous_onglets = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getSousOnglets(): array
    {
        return $this->sous_onglets;
    }

    public function setSousOnglets(?array $sous_onglets): self
    {
        $this->sous_onglets = $sous_onglets;

        return $this;
    }
}
