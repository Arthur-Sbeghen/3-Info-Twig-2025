<?php
require 'twig_carregar.php';
require 'inc/banco.php';

$login = $_POST["login"] ?? null;
$senha = $_POST["senha"] ?? null;

if ($login && $senha) {
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
    $query->execute([':login' => $login, ':senha' => $senha]);
    $result = $query->fetch();  
    if ($result) {
        session_start();
        $_SESSION['user'] = $result['login'];
        header("location:index.php");
    }
}

echo $twig->render('login.html', []);