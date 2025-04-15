<?php
require_once 'twig_carregar.php';
require 'inc/banco.php';

if(!$_SESSION["usuario"]) header("location:login.php");

$nome = $_GET['name'] ?? null; 
$id = $_GET['id'] ?? null;
$pNome = $_POST['item'] ?? null;
$pId = $_POST['id'] ?? null;

if ($nome && $id) {
    echo $twig->render("edit.html", ['item'=> $nome,'id' => $id]);
} elseif ($pNome && $pId) {
    $query = $pdo->prepare("UPDATE compras c SET item = :nome WHERE id = :id");
    $binds = [':nome' => $pNome, ':id' => $pId];
    $query->execute($binds);
    header("location:compras.php");
}