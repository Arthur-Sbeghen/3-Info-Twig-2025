<?php
require_once 'twig_carregar.php';

if(!isset($_SESSION["usuario"])) header("location:login.php");

echo $twig->render('index.html', ['fruta' => 'abacaxi', 'user' => $_SESSION["usuario"]]);