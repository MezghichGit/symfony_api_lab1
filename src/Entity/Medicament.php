<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
 /**
 * @ApiResource(
 * itemOperations={"get"},
 * collectionOperations={"get"})
 */

class Medicament
{
   
    /**
    * @ApiProperty(identifier=true, description="code du Medicament")
    */
    private $code;
    
    private $libelle;

  
    private $prix;

    

    private $dateExp;

    

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDateExp(): ?string
    {
        return $this->dateExp;
    }

    public function setDateExp(string $dateExp): self
    {
        $this->dateExp = $dateExp;

        return $this;
    }
}
