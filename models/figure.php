<?php

class Figure {
    private int $id;
    private string $name;
    private string $description;
    private string $picturePath;
    private string $videoPath;
    private \DateTime $createdAt;
    private ?\DateTime $deletedAt = null;
    private ?\DateTime $updatedAt = null;

    function __construct() {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicturePath(): string
    {
        return $this->picturePath;
    }
 
    public function setPicturePath(string $picturePath): self
    {
        $this->picturePath = $picturePath;

        return $this;
    }

    public function getVideoPath(): string
    {
        return $this->videoPath;
    }

    public function setVideoPath(string $videoPath): self
    {
        $this->videoPath = $videoPath;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\Datetime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\Datetime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
