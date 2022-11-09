<?php

require_once('models/figure.php');
require_once('lib/database.php');
require_once('repositories/figureRepository.php');

final class FigureController
{
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

            $figureRepository = new FigureRepository();
            $figureRepository->setConnection((new DatabaseConnection())->getConnection());

            $figureRepository->create($figure);
        }

        require_once('views/pages/figure/create.php');
    }

    function read()
    {


    }

    function update()
    {

    }

    function delete()
    {

    }

    function list()
    {
        $figureRepository = new FigureRepository();
        $figureRepository->setConnection((new DatabaseConnection())->getConnection());

        $figures = $figureRepository->list();

        require_once('views/pages/figure/list.php');
    }
}