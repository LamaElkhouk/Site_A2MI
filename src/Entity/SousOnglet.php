<?php

namespace App\Entity;

use App\Repository\SousOngletRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousOngletRepository::class)]
class SousOnglet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien = null;

    #[ORM\ManyToOne(inversedBy: 'sous_onglet')]
    private ?OngletsHeader $ongletsHeader = null;

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

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getOngletsHeader(): ?OngletsHeader
    {
        return $this->ongletsHeader;
    }

    public function setOngletsHeader(?OngletsHeader $ongletsHeader): self
    {
        $this->ongletsHeader = $ongletsHeader;

        return $this;
    }
}
