<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=FruitsLegumes::class, mappedBy="vendeur")
     */
    private $produit;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="Livraison", orphanRemoval=true)
     */
    private $livreur;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="articles", orphanRemoval=true)
     */
    private $acheteur;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
        $this->livreur = new ArrayCollection();
        $this->acheteur = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|FruitsLegumes[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(FruitsLegumes $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
            $produit->setVendeur($this);
        }

        return $this;
    }

    public function removeProduit(FruitsLegumes $produit): self
    {
        if ($this->produit->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getVendeur() === $this) {
                $produit->setVendeur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getLivreur(): Collection
    {
        return $this->livreur;
    }

    public function addLivreur(Commande $livreur): self
    {
        if (!$this->livreur->contains($livreur)) {
            $this->livreur[] = $livreur;
            $livreur->setLivraison($this);
        }

        return $this;
    }

    public function removeLivreur(Commande $livreur): self
    {
        if ($this->livreur->removeElement($livreur)) {
            // set the owning side to null (unless already changed)
            if ($livreur->getLivraison() === $this) {
                $livreur->setLivraison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getAcheteur(): Collection
    {
        return $this->acheteur;
    }

    public function addAcheteur(Commande $acheteur): self
    {
        if (!$this->acheteur->contains($acheteur)) {
            $this->acheteur[] = $acheteur;
            $acheteur->setArticles($this);
        }

        return $this;
    }

    public function removeAcheteur(Commande $acheteur): self
    {
        if ($this->acheteur->removeElement($acheteur)) {
            // set the owning side to null (unless already changed)
            if ($acheteur->getArticles() === $this) {
                $acheteur->setArticles(null);
            }
        }

        return $this;
    }
}
