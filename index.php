<?php

    // define('HOMEPAGE_PATH', '/');
    // define('CONTACT_PATH', '/contact');

    const HOMEPAGE_PATH = '/';
    const CONTACT_PATH = '/contact';

    require_once('views/base.php');

    var_dump($_SERVER['REQUEST_URI']);

    switch($_SERVER['REQUEST_URI']) {
        case HOMEPAGE_PATH:
            echo 'ACCUEILl';
            break;
        case CONTACT_PATH:
            echo 'CONTACT';
            break;
    }

    /**
    if($_SERVER['REQUEST_URI'] === '/') {
        echo 'ACCUEIL';
    } elseif($_SERVER['REQUEST_URI'] === '/contact') {
        echo 'CONTACT';
    }
    **/