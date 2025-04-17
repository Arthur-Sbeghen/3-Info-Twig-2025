<?php
require 'twig_carregar.php';
use Carbon\Carbon;

if(!isset($_SESSION["usuario"])) header("location:login.php");

echo $twig->render("horario.html", [
    'titulo'=>'Horario',
    'today'=>Carbon::now(),
    'tomorrow'=>Carbon::now()->addDay(),
    'user' => $_SESSION["usuario"]
]);