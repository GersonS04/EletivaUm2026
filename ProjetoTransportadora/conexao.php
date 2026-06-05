<?php

$dominio = "mysql:host=localhost;dbname=transportadora;charset=utf8";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO($dominio, $usuario, $senha);

    // garante modo de erro (boa prática)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
