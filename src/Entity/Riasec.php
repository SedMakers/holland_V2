<?php

namespace App\Entity;

use App\Repository\RiasecRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiasecRepository::class)]
class Riasec
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $R = null;

    #[ORM\Column]
    private ?int $I = null;

    #[ORM\Column]
    private ?int $A = null;

    #[ORM\Column]
    private ?int $S = null;

    #[ORM\Column]
    private ?int $E = null;

    #[ORM\Column]
    private ?int $C = null;

    #[ORM\ManyToMany(targetEntity: Personnalite::class, mappedBy: 'Riasec')]
    private Collection $resultats;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getR(): ?int
    {
        return $this->R;
    }

    public function setR(int $R): self
    {
        $this->R = $R;

        return $this;
    }

    public function getI(): ?int
    {
        return $this->I;
    }

    public function setI(int $I): self
    {
        $this->I = $I;

        return $this;
    }

    public function getA(): ?int
    {
        return $this->A;
    }

    public function setA(int $A): self
    {
        $this->A = $A;

        return $this;
    }

    public function getS(): ?int
    {
        return $this->S;
    }

    public function setS(int $S): self
    {
        $this->S = $S;

        return $this;
    }

    public function getE(): ?int
    {
        return $this->E;
    }

    public function setE(int $E): self
    {
        $this->E = $E;

        return $this;
    }

    public function getC(): ?int
    {
        return $this->C;
    }

    public function setC(int $C): self
    {
        $this->C = $C;

        return $this;
    }

    /**
     * @return Collection<int, Personnalite>
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Personnalite $resultat): self
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats->add($resultat);
            $resultat->addRiasec($this);
        }

        return $this;
    }

    public function removeResultat(Personnalite $resultat): self
    {
        if ($this->resultats->removeElement($resultat)) {
            $resultat->removeRiasec($this);
        }

        return $this;
    }
}
