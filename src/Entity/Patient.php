<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(
 * itemOperations={"get"},
 * collectionOperations={"get"})
 */
class Patient
{
    /**
    * @ApiProperty(identifier=true, description="cin du patient")
    */
    private $cin;

    /**
    * @ApiProperty(description="nom du patient")
    */
    private $nom;

    /**
    * @ApiProperty(description="prenom du patient")
    */
    private $prenom;

    /**
    * @ApiProperty(description="age du patient",
    * openapiContext={"example" = "10/07/1985"})
    */
    private $age;


    public function __construct($cin, $nom,$prenom, $age)
    {
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->age=$age;
    }
    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
