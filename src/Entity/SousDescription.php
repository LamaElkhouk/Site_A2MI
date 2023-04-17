<?php

namespace App\Entity;

use App\Repository\SousDescriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousDescriptionRepository::class)]
class SousDescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'sous_description')]
    private ?Introduction $introduction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getIntroduction(): ?Introduction
    {
        return $this->introduction;
    }

    public function setIntroduction(?Introduction $introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }
}
