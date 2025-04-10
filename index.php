<?php
require_once 'twig_carregar.php';

if ($_SESSION['usuario']) {
    echo $twig->render('index.html', ['fruta' => 'abacaxi']);
} else {
    header('location:login.php');
}