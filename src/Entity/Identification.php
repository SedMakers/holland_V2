<?php

namespace App\Entity;

use App\Repository\IdentificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdentificationRepository::class)]
class Identification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 50)]
    private ?string $mail = null;

    #[ORM\OneToOne(mappedBy: 'Identification', cascade: ['persist', 'remove'])]
    private ?Riasec $riasec = null;

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

    public function getRiasec(): ?Riasec
    {
        return $this->riasec;
    }

    public function setRiasec(?Riasec $riasec): self
    {
        // unset the owning side of the relation if necessary
        if ($riasec === null && $this->riasec !== null) {
            $this->riasec->setIdentification(null);
        }

        // set the owning side of the relation if necessary
        if ($riasec !== null && $riasec->getIdentification() !== $this) {
            $riasec->setIdentification($this);
        }

        $this->riasec = $riasec;

        return $this;
    }
}
