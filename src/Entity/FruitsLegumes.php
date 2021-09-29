<?php

namespace App\Entity;

use App\Repository\FruitsLegumesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FruitsLegumesRepository::class)
 */
class FruitsLegumes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vendeur;

    /**
     * @ORM\ManyToMany(targetEntity=Commande::class, inversedBy="composer")
     */
    private $constituer;

    public function __construct()
    {
        $this->constituer = new ArrayCollection();
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

    public function getVendeur(): ?Utilisateur
    {
        return $this->vendeur;
    }

    public function setVendeur(?Utilisateur $vendeur): self
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getConstituer(): Collection
    {
        return $this->constituer;
    }

    public function addConstituer(Commande $constituer): self
    {
        if (!$this->constituer->contains($constituer)) {
            $this->constituer[] = $constituer;
        }

        return $this;
    }

    public function removeConstituer(Commande $constituer): self
    {
        $this->constituer->removeElement($constituer);

        return $this;
    }
}
