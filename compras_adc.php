<?php
require 'inc/banco.php';

$item = $_POST['item'] ?? null;
if ($item) {
    $query = $pdo->prepare("INSERT INTO compras (item) VALUES (:nome)"); 
    $binds = [':nome'=>$item];
    $query->execute($binds);
}

header("location:compras.php");