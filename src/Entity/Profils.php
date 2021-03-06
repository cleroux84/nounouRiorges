<?php

namespace App\Entity;

use App\Repository\ProfilsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilsRepository::class)
 */
class Profils
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenom;
    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumeroRueAdresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeAdresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $presentationText;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Animaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoIdentite;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $AgrementDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $placeDispo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tarifHoraire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tarifEntretien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $horaires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formationPremierSecours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bafa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formationPetiteEnfance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $permisConduire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vehicule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $languesParlees;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

       public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroRueAdresse(): ?string
    {
        return $this->NumeroRueAdresse;
    }

    public function setNumeroRueAdresse(?string $NumeroRueAdresse): self
    {
        $this->NumeroRueAdresse = $NumeroRueAdresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(?int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): self
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getVilleAdresse(): ?string
    {
        return $this->villeAdresse;
    }

    public function setVilleAdresse(?string $villeAdresse): self
    {
        $this->villeAdresse = $villeAdresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPresentationText(): ?string
    {
        return $this->presentationText;
    }

    public function setPresentationText(?string $presentationText): self
    {
        $this->presentationText = $presentationText;

        return $this;
    }

    public function getAnimaux()
    {
        return $this->Animaux;
    }

    public function setAnimaux($Animaux): self
    {
        $this->Animaux = $Animaux;

        return $this;
    }

    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }

    public function setPhoto1(?string $photo1): self
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }

    public function setPhoto2(?string $photo2): self
    {
        $this->photo2 = $photo2;

        return $this;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }

    public function setPhoto3(?string $photo3): self
    {
        $this->photo3 = $photo3;

        return $this;
    }

    public function getPhoto4(): ?string
    {
        return $this->photo4;
    }

    public function setPhoto4(?string $photo4): self
    {
        $this->photo4 = $photo4;

        return $this;
    }

    public function getPhotoIdentite(): ?string
    {
        return $this->photoIdentite;
    }

    public function setPhotoIdentite(?string $photoIdentite): self
    {
        $this->photoIdentite = $photoIdentite;

        return $this;
    }

    public function getAgrementDate(): ?\DateTimeInterface
    {
        return $this->AgrementDate;
    }

    public function setAgrementDate(?\DateTimeInterface $AgrementDate): self
    {
        $this->AgrementDate = $AgrementDate;

        return $this;
    }

    public function getPlaceDispo(): ?int
    {
        return $this->placeDispo;
    }

    public function setPlaceDispo(?int $placeDispo): self
    {
        $this->placeDispo = $placeDispo;

        return $this;
    }

    public function getTarifHoraire(): ?string
    {
        return $this->tarifHoraire;
    }

    public function setTarifHoraire(?string $tarifHoraire): self
    {
        $this->tarifHoraire = $tarifHoraire;

        return $this;
    }

    public function getTarifEntretien(): ?string
    {
        return $this->tarifEntretien;
    }

    public function setTarifEntretien(?string $tarifEntretien): self
    {
        $this->tarifEntretien = $tarifEntretien;

        return $this;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(?string $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function getFormationPremierSecours()
    {
        return $this->formationPremierSecours;
    }

    public function setFormationPremierSecours($formationPremierSecours): self
    {
        $this->formationPremierSecours = $formationPremierSecours;

        return $this;
    }

    public function getBafa()
    {
        return $this->bafa;
    }

    public function setBafa($bafa): self
    {
        $this->bafa = $bafa;

        return $this;
    }

    public function getFormationPetiteEnfance()
    {
        return $this->formationPetiteEnfance;
    }

    public function setFormationPetiteEnfance($formationPetiteEnfance): self
    {
        $this->formationPetiteEnfance = $formationPetiteEnfance;

        return $this;
    }

    public function getPermisConduire()
    {
        return $this->permisConduire;
    }

    public function setPermisConduire($permisConduire): self
    {
        $this->permisConduire = $permisConduire;

        return $this;
    }

    public function getVehicule()
    {
        return $this->vehicule;
    }

    public function setVehicule($vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getLanguesParlees(): ?string
    {
        return $this->languesParlees;
    }

    public function setLanguesParlees(?string $languesParlees): self
    {
        $this->languesParlees = $languesParlees;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(?string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }
}
