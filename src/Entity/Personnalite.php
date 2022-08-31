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

    #[ORM\ManyToMany(targetEntity: Riasec::class, inversedBy: 'resultats')]
    private Collection $Riasec;

    public function __construct()
    {
        $this->Riasec = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Riasec>
     */
    public function getRiasec(): Collection
    {
        return $this->Riasec;
    }

    public function addRiasec(Riasec $riasec): self
    {
        if (!$this->Riasec->contains($riasec)) {
            $this->Riasec->add($riasec);
        }

        return $this;
    }

    public function removeRiasec(Riasec $riasec): self
    {
        $this->Riasec->removeElement($riasec);

        return $this;
    }
}
