<?php

require_once('models/figure.php');

final class FigureRepository
{
    private $databaseConnection = null;

    public function create(Figure $figure): void
    {
        $stmt = $this->databaseConnection->prepare('INSERT INTO figure (name, description, picturePath, videoPath, createdAt) VALUES (:name, :description, :picturePath, :videoPath, :createdAt)');

        $name = $figure->getName();
        $description = $figure->getDescription();
        $picturePath = $figure->getPicturePath();
        $videoPath = $figure->getVideoPath();
        $createdAt = $figure->getCreatedAt()->format('Y-m-d H:i:s');

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':picturePath', $picturePath);
        $stmt->bindParam(':videoPath', $videoPath);
        $stmt->bindParam(':createdAt', $createdAt);

        $stmt->execute();
    }

    public function list(): array
    {
        $stmt = $this->databaseConnection->prepare('SELECT * FROM figure');

        $stmt->execute();
        $results = $stmt->fetchAll();

        $figures = [];

        foreach($results as $result) {
            $figure = new Figure();
            $figure->setId($result['id']);
            $figure->setName($result['name']);
            $figure->setDescription($result['description']);
            $figure->setPicturePath($result['picturePath']);
            $figure->setVideoPath($result['videoPath']);
            $figure->setCreatedAt(new \DateTime($result['createdAt']));
            $figure->setUpdatedAt($result['updatedAt'] !== null ? new \DateTime($result['updatedAt']) : null);

            $figures[] = $figure; 
        }

        return $figures;
    }

    public function setConnection(\PDO $databaseConnection): self
    {
        $this->databaseConnection = $databaseConnection;

        return $this;
    }
}