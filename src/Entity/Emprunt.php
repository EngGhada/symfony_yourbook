<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adherent $adherent = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exemplaire $exemplaire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_emprunt = null;

    // #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    // private ?\DateTimeInterface $date_previsionnelle = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_retour = null;

    #[ORM\Column]
    private ?bool $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): static
    {
        $this->adherent = $adherent;

        return $this;
    }

    public function getExemplaire(): ?Exemplaire
    {
        return $this->exemplaire;
    }

    public function setExemplaire(?Exemplaire $exemplaire): static
    {
        $this->exemplaire = $exemplaire;

        return $this;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->date_emprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $date_emprunt): static
    {
        $this->date_emprunt = $date_emprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }

    public function setDateRetour(?\DateTimeInterface $date_retour): static
    {
        $this->date_retour = $date_retour;

        return $this;
    }



    public function getDatePrevisionnelle(): ?\DateTimeInterface

    {
        $date_previsionnelle=null;
        if ($this->getDateEmprunt()) {
            $date_previsionnelle =DateTime::createFromInterface($this->getDateEmprunt());
            $date_previsionnelle->modify('+3 weeks');
        }
       return $date_previsionnelle; 
    }
/**
 * Get the value of date_previsionnelle
 */

// public function getDatePrevisionnelle(): ?\DateTimeInterface
// {
//     return $this->date_previsionnelle;
// }

/**
 * Set the value of date_previsionnelle
 */
// public function setDatePrevisionnelle(?\DateTimeInterface $date_previsionnelle): self
// {
//     $this->date_previsionnelle = $date_previsionnelle;
//     return $this;
// }

// public function setDatePrevisionnelleAutomatically(): self
// {
//     $dateEmprunt = $this->getDateEmprunt() ?? new \DateTime(); // fallback to current date

//     $datePrevisionnelle = \DateTime::createFromInterface($dateEmprunt);
//     $datePrevisionnelle->modify('+3 weeks');

//     $this->setDatePrevisionnelle($datePrevisionnelle);
    
//     return $this;
// }
    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
 

    
}
