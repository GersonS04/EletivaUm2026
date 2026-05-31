<?php
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h2>Bem-vindo, <?= $_SESSION['nome'] ?> 👋</h2>

        <hr>

        <div class="list-group">

            <a href="clientes.php" class="list-group-item list-group-item-action">
                Clientes
            </a>

            <a href="motoristas.php" class="list-group-item list-group-item-action">
                Motoristas
            </a>

            <a href="cargas.php" class="list-group-item list-group-item-action">
                Cargas
            </a>

            <a href="entregas.php" class="list-group-item list-group-item-action">
                Entregas
            </a>

            <a href="logout.php" class="list-group-item list-group-item-action text-danger">
                Sair
            </a>

        </div>

    </div>

</body>

</html>