<?php
require 'inc/banco.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $query = $pdo->prepare("DELETE FROM compras WHERE id = :id"); 
    $binds = [':id'=>$id];
    $query->execute($binds);
}

header("location:compras.php");