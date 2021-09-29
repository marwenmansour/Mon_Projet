<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="livreur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Livraison;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="acheteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $articles;

    /**
     * @ORM\ManyToMany(targetEntity=FruitsLegumes::class, mappedBy="constituer")
     */
    private $composer;

    public function __construct()
    {
        $this->composer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivraison(): ?Utilisateur
    {
        return $this->Livraison;
    }

    public function setLivraison(?Utilisateur $Livraison): self
    {
        $this->Livraison = $Livraison;

        return $this;
    }

    public function getArticles(): ?Utilisateur
    {
        return $this->articles;
    }

    public function setArticles(?Utilisateur $articles): self
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * @return Collection|FruitsLegumes[]
     */
    public function getComposer(): Collection
    {
        return $this->composer;
    }

    public function addComposer(FruitsLegumes $composer): self
    {
        if (!$this->composer->contains($composer)) {
            $this->composer[] = $composer;
            $composer->addConstituer($this);
        }

        return $this;
    }

    public function removeComposer(FruitsLegumes $composer): self
    {
        if ($this->composer->removeElement($composer)) {
            $composer->removeConstituer($this);
        }

        return $this;
    }
}
