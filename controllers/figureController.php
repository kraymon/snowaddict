<?php

final class FigureController
{
    function create(): void
    {
        $isSent = false;

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $isSent = true;
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

    }
}