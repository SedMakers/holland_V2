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

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 180)]
    private ?string $mail = null;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
}