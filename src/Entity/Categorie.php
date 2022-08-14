<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

//collectionOperations={"get"},
//itemOperations={"get","put"},

/**
 * @ApiResource(
 * normalizationContext={"groups"={"categorie:read"}},
 * denormalizationContext={"groups"={"categorie:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"libelle": "partial"})
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("categorie:read")
     * @Groups("categorie:details")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"categorie:read","categorie:write"})
     * @Groups("categorie:details")
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Pharmacie::class, mappedBy="categorie")
     */
    private $pharmacies;

    public function __construct()
    {
        $this->pharmacies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Pharmacie>
     */
    public function getPharmacies(): Collection
    {
        return $this->pharmacies;
    }

    public function addPharmacy(Pharmacie $pharmacy): self
    {
        if (!$this->pharmacies->contains($pharmacy)) {
            $this->pharmacies[] = $pharmacy;
            $pharmacy->setCategorie($this);
        }

        return $this;
    }

    public function removePharmacy(Pharmacie $pharmacy): self
    {
        if ($this->pharmacies->removeElement($pharmacy)) {
            // set the owning side to null (unless already changed)
            if ($pharmacy->getCategorie() === $this) {
                $pharmacy->setCategorie(null);
            }
        }

        return $this;
    }
}
