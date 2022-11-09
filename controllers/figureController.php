<?php

require_once('models/figure.php');
require_once('lib/database.php');
require_once('repositories/figureRepository.php');

final class FigureController
{
    private FigureRepository $figureRepository;

    function __construct()
    {
        $this->figureRepository = new FigureRepository();

        $this->figureRepository->setConnection((new DatabaseConnection())->getConnection());
    }

    function create(): void
    {
        $isSent = false;

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $isSent = true;

            $figure = new Figure();
            $figure->setName($_POST['name']);
            $figure->setDescription($_POST['description']);
            $figure->setPicturePath($_POST['picture']);
            $figure->setVideoPath($_POST['video']);

            $this->figureRepository->create($figure);
        }

        require_once('views/pages/figure/create.php');
    }

    function read()
    {


    }

    function update(int $figureId): void
    {
        $isSent = false;

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $figure = new Figure();
            $figure->setId($figureId);
            $figure->setName($_POST['name']);
            $figure->setDescription($_POST['description']);
            $figure->setPicturePath($_POST['picture']);
            $figure->setVideoPath($_POST['video']);
            $figure->setUpdatedAt(new \DateTime());

            $this->figureRepository->update($figure);

            $isSent = true;
        } else {
            $figure = $this->figureRepository->findById($figureId);
        }

        require_once('views/pages/figure/update.php');
    }

    function delete(int $figureId)
    {
        $this->figureRepository->delete($figureId);

        $isDelete = true;

        $figures = $this->figureRepository->list();

        require_once('views/pages/figure/list.php');
    }

    function list()
    {
        $figures = $this->figureRepository->list();

        require_once('views/pages/figure/list.php');
    }
}