<?php
require_once 'twig_carregar.php';
require 'inc/banco.php';

if(!isset($_SESSION["usuario"])) header("location:login.php");

$login = $_GET['login'] ?? null;
$id = $_GET['id'] ?? null;
$plogin = $_POST['login'] ?? null;
$psenha = $_POST['senha'] ?? null;
$pId = $_POST['id'] ?? null;

if ($login) {
    echo $twig->render("edt_user.html", ['id'=> $id, 'login'=>$login]);
} elseif ($plogin && $pId) {
    $update = "UPDATE usuarios SET login = :login". ($psenha ? ", senha = :senha" : "") ." WHERE id = :id";
    $query = $pdo->prepare($update);
    $binds = [':login' => $plogin, ':id' => $pId];
    $psenha ? $binds[':senha'] = $psenha : "";
    $query->execute($binds);
    header("location:usuarios.php");
}