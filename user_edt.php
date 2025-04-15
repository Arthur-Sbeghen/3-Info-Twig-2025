<?php
require_once 'twig_carregar.php';
require 'inc/banco.php';

if(!$_SESSION["usuario"]) header("location:login.php");

$login = $_GET['login'] ?? null;
$id = $_GET['id'] ?? null;
$plogin = $_POST['item'] ?? null;
$psenha = $_POST['senha'];
$pId = $_POST['id'] ?? null;

if ($login) {
    echo $twig->render("edit_user.html", ['id'=> $id, 'login'=>$login]);
} elseif ($plogin && $pId) {
    $update = "UPDATE usuarios SET login = :login". $psenha ? ", senha = :senha" : "" ." WHERE id = :id";
    $query = $pdo->prepare($update);
    $binds = [':login' => $plogin, ':senha' => $psenha, ':id' => $pId];
    $query->execute($binds);
    header("location:usuarios.php");
}