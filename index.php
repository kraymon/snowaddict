<?php
    require_once('controllers/homepageController.php');
    require_once('controllers/figureController.php');

    try {
        if(isset($_GET['action']) && '' !== $_GET['action']) {
            $action = $_GET['action'];

            if ('figure' === $_GET['controller']) {
                $figureController = new FigureController();

                if ('create' === $action) {
                    $figureController->create();
                }

                if ('list' === $action) {
                    if (array_key_exists('id', $_GET)) {
                        $figureController->delete($_GET['id']);
                    } else {
                        $figureController->list();
                    }
                }

                if ('update' === $action) {
                    if (!array_key_exists('id', $_GET)) {
                        throw new \Exception('Id parameter is mandatory');
                    }

                    $figureController->update($_GET['id']);
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
