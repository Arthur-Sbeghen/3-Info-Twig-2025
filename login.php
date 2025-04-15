<?php
require 'twig_carregar.php';
require 'inc/banco.php';

$login = $_POST["login"] ?? null;
$senha = $_POST["senha"] ?? null;

if ($login && $senha) {
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
    $query->execute([':login' => $login]);
    $user = $query->fetch();
    if($usuario && password_verify($senha, $usuario['senha']))
    $pass = password_verify($result['senha'], password_hash($senha, PASSWORD_BCRYPT));  
    if ($pass) {
        session_start();
        $_SESSION['user'] = $result['login'];
        header("location:index.php");
    }
}

echo $twig->render('login.html', []);