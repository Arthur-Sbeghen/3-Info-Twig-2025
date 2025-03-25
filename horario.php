<?php
require 'twig_carregar.php';
use Carbon\Carbon;
echo $twig->render("horario.html", [
    'titulo'=>'Horario',
    'today'=>Carbon::now(),
    'tomorrow'=>Carbon::now()->addDay()
]);