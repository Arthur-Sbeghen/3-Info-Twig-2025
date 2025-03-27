<?php
require 'inc/banco.php';

$nome = $_POST['nome'] ?? null;
$data = $_POST['data'] ?? null;

if($nome && $data) {
    $query = $pdo->prepare("INSERT INTO compromissos (nome, data) VALUES (:nome, :data)"); 
    $binds = [
        ':nome'=>$nome,
        ':data'=>$data
    ];
    $query->execute($binds);
}

header("location:compromissos.php");