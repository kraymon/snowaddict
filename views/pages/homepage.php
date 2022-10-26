<?php ob_start(); ?>

<h1>Welcome to the homepage!</h1>

<?php $content = ob_get_clean(); ?>

<?php require_once('views/layout.php'); ?>