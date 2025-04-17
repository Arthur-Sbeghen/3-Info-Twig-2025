<?php
require_once 'twig_carregar.php';
require 'inc/banco.php';

use Carbon\Carbon;

if(!isset($_SESSION["usuario"])) header("location:login.php");

$query = 'SELECT * FROM compromissos ';

$id = $_GET['ord'] ?? null;
if($id){
    $query .= 'ORDER BY ';
    switch($id) {
        case 1:
            $query .= 'data desc';
            break;
        case 2:
            $query .= 'data asc';
            break;
        case 3:
            $query .= 'nome asc';
            break;
        case 4:
            $query .= 'nome desc';
            break;
        default:
            break;
    }
}

$data = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as &$d) {
    $d['data'] = Carbon::parse($d['data']);
    $d['isWeekend'] = Carbon::parse($d['data'])->isWeekend();
}

echo $twig->render("compromissos.html", [
    'titulo'=>'Compromissos',
    'compromissos' => $data,
    'user' => $_SESSION["usuario"]
]);