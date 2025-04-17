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
    echo $twig->render("edt_user.html", ['id'=> $id, 'login'=>$login, 'user' => $_SESSION["usuario"]]);
} elseif ($plogin && $pId) {
    $update = "UPDATE usuarios SET login = :login". ($psenha ? ", senha = :senha" : "") ." WHERE id = :id";
    $query = $pdo->prepare($update);
    $binds = [':login' => $plogin, ':id' => $pId];
    $psenha ? $binds[':senha'] = password_hash($psenha, PASSWORD_DEFAULT) : "";
    $query->execute($binds);
    header("location:usuarios.php");
}

$user = $_POST["user"] ?? null;
$oldPass = $_POST["oldPass"] ?? null;
$newPass = $_POST["newPass"] ?? null;
$confirmPass = $_POST["confirmPass"] ?? null;

if($user && $oldPass && $newPass && $confirmPass) {
    $select = $pdo->prepare()
}