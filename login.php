<?php
require 'twig_carregar.php';
require 'inc/banco.php';

$login = $_POST["login"] ?? null;
$senha = $_POST["senha"] ?? null;

$usuario = $_POST["user"] ?? null;
$pass = $_POST["pass"] ?? null;

if ($login && $senha) {
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
    $query->execute([':login' => $login]);
    $dados = $query->fetch();
    if($usuario && password_verify($senha, $dados['senha'])) {
        $_SESSION['usuario'] = $dados['login'];
        header("location:index.php");
    }
} else if ($usuario && $pass) {
    $query = $pdo->prepare("INSERT INTO usuarios (login, senha) VALUES (:login, :senha)");
    $query->execute([':login' => $usuario, ':senha' => password_hash($pass, PASSWORD_BCRYPT)]);
    $_SESSION['usuario'] = $usuario;
    header("location:index.php");
}

echo $twig->render('login.html', []);