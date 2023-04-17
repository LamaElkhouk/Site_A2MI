<?php

namespace App\Entity;

use App\Repository\OngletsHeaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'ongletsHeader', targetEntity: SousOnglet::class)]
    private Collection $sous_onglet;

    public function __construct()
    {
        $this->sous_onglet = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, SousOnglet>
     */
    public function getSousOnglet(): Collection
    {
        return $this->sous_onglet;
    }

    public function addSousOnglet(SousOnglet $sousOnglet): self
    {
        if (!$this->sous_onglet->contains($sousOnglet)) {
            $this->sous_onglet->add($sousOnglet);
            $sousOnglet->setOngletsHeader($this);
        }

        return $this;
    }

    public function removeSousOnglet(SousOnglet $sousOnglet): self
    {
        if ($this->sous_onglet->removeElement($sousOnglet)) {
            // set the owning side to null (unless already changed)
            if ($sousOnglet->getOngletsHeader() === $this) {
                $sousOnglet->setOngletsHeader(null);
            }
        }

        return $this;
    }
}