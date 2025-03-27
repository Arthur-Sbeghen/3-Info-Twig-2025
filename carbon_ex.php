<?php
require 'vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
use Carbon\Carbon;
echo Carbon::now() . '<br>';
echo Carbon::now()->addDay() . '<br>';
echo Carbon::now()->subWeek() . '<br>';
echo 'Próximas Olimpíadas ' . Carbon::createFromDate(2024)->addYears(4)->year . '<br>';
echo 'Idade de alguém: ' . Carbon::createFromDate(2007, 12, 3)->age . '<br>';
echo (Carbon::now()->isWeekend() ? 'Festa!' : 'Aula') . '<br>';
$nascimento = Carbon::createFromDate(2007,12,3);
echo 'Diferença de Data: ' . Carbon::now()->diff($nascimento);
$data_random = '2023-04-05';
$data = Carbon::parse($data_random);
echo '<br>'.$data;