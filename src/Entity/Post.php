<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
/**
 * @ApiResource(
 * itemOperations={"get"},
 * collectionOperations={"get"})
 */
class Post
{

    /** 
     * @ApiProperty(identifier=true, description="id du Post")
    */

    private $id;
    /**
    * @ApiProperty(description="id du User du Post")
    */
    private $userId;
    /**
    * @ApiProperty(description="titre du post")
    */
    private $title;
    /**
    * @ApiProperty(description="contenu du post")
    */
    private $body;

    public function __construct($id, $userId,$title, $body)
    {
    $this->id=$id;
    $this->userId=$userId;
    $this->title=$title;
    $this->body=$body;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
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

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }
}
