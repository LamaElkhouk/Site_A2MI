<?php

namespace App\Entity;

use App\Repository\LogoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogoRepository::class)]
class Logo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lien_image = null;

    #[ORM\ManyToOne(inversedBy: 'logos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeClient $type = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLienImage(): ?string
    {
        return $this->lien_image;
    }

    public function setLienImage(?string $lien_image): self
    {
        $this->lien_image = $lien_image;

        return $this;
    }

    public function getType(): ?TypeClient
    {
        return $this->type;
    }

    public function setType(?TypeClient $type): self
    {
        $this->type = $type;

        return $this;
    }
}
