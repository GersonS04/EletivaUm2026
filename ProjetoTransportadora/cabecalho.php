<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['acesso'])) {
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Transportadora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark no-print">
        <div class="container">

            <a class="navbar-brand" href="principal.php">
                🚚 Transportadora
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="principal.php">Início</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Clientes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="motoristas.php">Motoristas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cargas.php">Cargas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="entregas.php">Entregas</a>
                    </li>

                </ul>

                <span class="navbar-text text-white">
                    <?= $_SESSION['nome'] ?>
                </span>

                <a href="logout.php" class="btn btn-outline-light btn-sm ms-3">
                    Sair
                </a>

            </div>

        </div>
    </nav>

    <div class="container py-3">