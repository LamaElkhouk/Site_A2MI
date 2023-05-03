<?php

namespace App\Entity;

use App\Repository\EchoMerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchoMerRepository::class)]
class EchoMer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_bouton = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_bouton = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
