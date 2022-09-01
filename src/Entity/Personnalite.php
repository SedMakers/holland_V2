<?php

namespace App\Entity;

use App\Repository\PersonnaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnaliteRepository::class)]
class Personnalite
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(nullable: true)]
    private ?int $serie = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $question = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(?int $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(?string $question): self
    {
        $this->question = $question;

        return $this;
    }
}