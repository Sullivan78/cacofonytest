<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 * @UniqueEntity("email")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(min=2, max=50, minMessage="Connard met plus de caractère !", maxMessage="Met moins de caractère en fait !")
     * @Assert\NotBlank(message="Le vide c'est mal remplit moi !")
     */
    private $nom;

    /**
     *@ORM\Column(type="string", length=50)
     * @Assert\Length(min=2, max=50, minMessage="Connard met plus de caractère !", maxMessage="Met moins de caractère en fait !")
     * @Assert\NotBlank(message="Le vide c'est mal remplit moi !")
     */
    private $prenom;

    /**
     *@ORM\Column(type="string", length=100)
     * @Assert\Length(min=5, max=100, minMessage="Connard met plus de caractère !", maxMessage="Met moins de caractère en fait !")
     * @Assert\NotBlank(message="Le vide c'est mal remplit moi !")
     */
    private $adresse;

    /**
    *@ORM\Column(type="integer", length=5)
     * @Assert\Range(min = 00000, max = 99999, minMessage="Rentre un vrai code postal ^^", maxMessage="Abuse pas {{ limit }}, tu n'es pas un extra-terrestre !")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(min=3, max=50, minMessage="Connard met plus de caractère !", maxMessage="Met moins de caractère en fait !")
     * @Assert\NotBlank(message="Le vide c'est mal remplit moi !")
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255, minMessage="Connard met plus de caractère !", maxMessage="Met moins de caractère en fait !")
     * @Assert\NotBlank(message="Le vide c'est mal remplit moi !")
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min = 0, max = 170, minMessage="Tu peux pas taper {{ limit }} là si tu es dans les bourses de ton père !", maxMessage="Abuse pas {{ limit }}, tu n'es pas HighLander !")
     */
    private $age;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creeLe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url(message = "L'url doit être conforme !")
     */
    private $photo;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCreeLe(): ?\DateTimeInterface
    {
        return $this->creeLe;
    }

    public function setCreeLe(\DateTimeInterface $creeLe): self
    {
        $this->creeLe = $creeLe;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
