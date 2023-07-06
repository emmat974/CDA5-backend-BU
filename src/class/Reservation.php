<?php

namespace App\Class;

class Reservation
{
    private ?int $id = null;
    private ?int $idOrdinateur = null;
    private ?int $idUtilisateur = null;

    private ?Ordinateur $ordinateur = null;
    private ?Utilisateur $utilisateur = null;

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idOrdinateur
     */
    public function getIdOrdinateur(): ?int
    {
        return $this->idOrdinateur;
    }

    /**
     * Set the value of idOrdinateur
     *
     * @return  self
     */
    public function setIdOrdinateur(int $idOrdinateur): self
    {
        $this->idOrdinateur = $idOrdinateur;

        return $this;
    }

    /**
     * Get the value of idUtilisateur
     */
    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */
    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getOrdinateur(): ?Ordinateur
    {
        return $this->ordinateur;
    }

    public function setOrdinateur(?Ordinateur $ordinateur): self
    {
        $this->ordinateur = $ordinateur;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
