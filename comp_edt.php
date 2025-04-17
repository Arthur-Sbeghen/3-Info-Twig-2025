<?php
require 'inc/banco.php';
require 'twig_carregar.php';

if(!isset($_SESSION["usuario"])) header("location:login.php");

$nome = $_POST['nome'] ?? null;
$data = $_POST['data'] ?? null;
$id = $_POST['id'] ?? null;
$nomeG = $_GET['nome'] ?? null;
$idG = $_GET['id'] ?? null;
$dataG = $_GET['data'] ?? null;

if ($nome && $id && $data) {
    $query = $pdo->prepare("UPDATE compromissos SET nome = :nome, data = :data WHERE id = :id");
    $binds = [':nome' => $nome, ':id' => $id, ':data' => $data];
    $query->execute($binds);
    header("location:compromissos.php");
} else if ($nomeG && $idG && $dataG) {
    echo $twig->render("comp_edit.html", ['nome'=> $nomeG,'id' => $idG, 'data' => $dataG, 'user' => $_SESSION["usuario"]]);
}