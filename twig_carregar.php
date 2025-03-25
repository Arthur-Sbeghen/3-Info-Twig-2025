<?php
require_once 'vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader);