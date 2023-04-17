<?php

namespace App\Entity;

use App\Repository\IntroductionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(length: 255)]
    private ?string $nom_bouton = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien_bouton = null;

    #[ORM\OneToMany(mappedBy: 'introduction', targetEntity: SousDescription::class)]
    private Collection $sous_description;

    public function __construct()
    {
        $this->sous_description = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, SousDescription>
     */
    public function getSousDescription(): Collection
    {
        return $this->sous_description;
    }

    public function addSousDescription(SousDescription $sousDescription): self
    {
        if (!$this->sous_description->contains($sousDescription)) {
            $this->sous_description->add($sousDescription);
            $sousDescription->setIntroduction($this);
        }

        return $this;
    }

    public function removeSousDescription(SousDescription $sousDescription): self
    {
        if ($this->sous_description->removeElement($sousDescription)) {
            // set the owning side to null (unless already changed)
            if ($sousDescription->getIntroduction() === $this) {
                $sousDescription->setIntroduction(null);
            }
        }

        return $this;
    }
}
