<?php
require 'twig_carregar.php';
require 'inc/banco.php';

$create = $_GET['create'] ?? null;
if ($create) {
    echo $twig->render('criarConta.html', []);
    die();
}

$login = $_POST["login"] ?? null;
$senha = $_POST["senha"] ?? null;

if ($login && $senha) {
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
    $query->execute([':login' => $login]);
    $dados = $query->fetch();
    if($dados && password_verify($senha, $dados['senha'])) {
        $_SESSION['usuario'] = $dados['login'];
        header("location:index.php");
    }
}

echo $twig->render('login.html', []);