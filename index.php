<?php

    // define('HOMEPAGE_PATH', '/');
    // define('CONTACT_PATH', '/contact');

    // const HOMEPAGE_PATH = '';
    const CONTACT_PATH = 'contact';

    require_once('views/base.php');

    $requestUri = explode('/', $_SERVER['REQUEST_URI']);

    switch($requestUri[array_key_last($requestUri)]) {
        /**case HOMEPAGE_PATH:
            echo 'ACCUEIL';
            break;*/
        case CONTACT_PATH:
            $controller = 'contact';
            $action = 'contact';
            echo 'CONTACT';
            break;
        default:
            $controller = 'homepage';
            $action = 'home';
            echo 'ACCUEIL';
    }

    require_once('controllers/'.$controller.'Controller.php');

    $controller = new ($controller.'Controller');

    echo $controller->{$action}('Jacques');

    /**
    if($_SERVER['REQUEST_URI'] === '/') {
        echo 'ACCUEIL';
    } elseif($_SERVER['REQUEST_URI'] === '/contact') {
        echo 'CONTACT';
    }
    **/
