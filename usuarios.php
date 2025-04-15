<?php
require_once 'twig_carregar.php';
require 'inc/banco.php';

if(!isset($_SESSION["usuario"])) header("location:login.php");

$dados = $pdo->query('SELECT id, login FROM usuarios');
$users = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render("usuarios.html", [
    'titulo'=>'Usuários',
    'users' => $users
]);