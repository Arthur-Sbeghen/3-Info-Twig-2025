<?php
require 'inc/banco.php';

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if($login && $senha) {
    $query = $pdo->prepare("INSERT INTO usuarios (login, senha) VALUES (:login, :senha)"); 
    $binds = [
        ':login'=>$login,
        ':senha'=>password_hash($senha, PASSWORD_BCRYPT)
    ];
    $query->execute($binds);
}

header("location:usuarios.php");