<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
* @ApiResource(
* normalizationContext={"groups"={"article:read"}},
* denormalizationContext={"groups"={"article:write"}}
* )
* @ORM\Entity(repositoryClass=ArticleRepository::class)
*/
class Article
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    * @Groups("article:read")
    */
    private $id;
    /**
    * @ORM\Column(type="string", length=255)
    * @Groups({"article:read", "article:write"})
    */
    private $title;
    /**
    * @ORM\Column(type="string", length=255)
    * @Groups("article:read")
    */
    private $slug;
    /**
    * @ORM\Column(type="string", length=255)
    * @Groups({"article:read", "article:write"})
    */
    private $content;
    /**
    * @ORM\Column(type="string", length=255)
    * @Groups({"article:read", "article:write"})
    */
    private $picture;
    /**
    * @ORM\Column(type="boolean")
    * @Groups("article:read")
    */
    private $isPublished;
    /**
    * @ORM\Column(type="datetime_immutable")
    * @Groups("article:read")
    */
    private $publishedAt;
    /**
    * @ORM\Column(type="datetime_immutable")
    * @Groups("article:read")
    */
    private $updatedAt;

    public function __construct()
    {
        $this->isPublished = false;
        $this->publishedAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
    public function getPicture(): ?string
    {
        return $this->picture;
    }
    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }
    public function isIsPublished(): ?bool
    {
        return $this->isPublished;
    }
    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;
        return $this;
    }
    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }
    public function setPublishedAt(\DateTimeImmutable $publishedAt): self
    {
        $this->publishedAt = $publishedAt;
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
}
