<?php
require 'twig_carregar.php';
use Carbon\Carbon;

if(!$_SESSION["usuario"]) header("location:login.php");

echo $twig->render("horario.html", [
    'titulo'=>'Horario',
    'today'=>Carbon::now(),
    'tomorrow'=>Carbon::now()->addDay()
]);