<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PharmacieRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ApiResource(
* collectionOperations={"get","post"={ "validation_groups"={"pharmacie:create"}}},
* itemOperations={
* "get" = {"normalization_context" = {"groups"={"pharmacie:read","pharmacie:details","categorie:details"}}},
* "put",
* "delete"
* },
 * normalizationContext={"groups"={"pharmacie:read"}},
 * denormalizationContext={"groups"={"pharmacie:write"}},

)
 * @ORM\Entity(repositoryClass=PharmacieRepository::class)
 */
class Pharmacie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("pharmacie:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pharmacie:read", "pharmacie:write"})
     * @Assert\NotBlank()
     * @Assert\Length(
        * min=3,
        * max=30,
        * minMessage="Le nom de la pharmacie en min 3 et max 30 caractères",
        * maxMessage="Le nom de la pharmacie ne doit pas dépasser max 30 caractères"
        )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pharmacie:read", "pharmacie:write"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pharmacie:read", "pharmacie:write"})
     * @Assert\NotBlank(groups={"pharmacie:create"})
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pharmacie:read", "pharmacie:write"})
     */
    private $ville;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups("pharmacie:read")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups("pharmacie:read")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="pharmacies")
     * @Groups({"pharmacie:details", "pharmacie:write"})
     */
    private $categorie;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

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

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
