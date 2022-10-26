<?php
    require_once('controllers/homepageController.php');

    try {
        if(isset($_GET['action']) && '' !== $_GET['action']) {
            $action = $_GET['action'];

            if ('figure' === $_GET['controller']) {
                $figureController = new FigureController();

                if ('create' === $action) {
                    $figureController->create();
                }
            }
        } else {
            (new HomepageController())->home();
        }
    } catch (\Exception $exception) {
        throw new \Exception($exception->getMessage());
    }

    /**
    if($_SERVER['REQUEST_URI'] === '/') {
        echo 'ACCUEIL';
    } elseif($_SERVER['REQUEST_URI'] === '/contact') {
        echo 'CONTACT';
    }
    **/
