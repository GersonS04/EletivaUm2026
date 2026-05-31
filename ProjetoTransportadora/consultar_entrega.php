<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR */
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $stmt = $pdo->prepare("
        SELECT e.*, c.nome AS cliente, m.nome AS motorista, ca.descricao AS carga
        FROM entrega e
        JOIN cliente c ON c.id = e.cliente_id
        JOIN motorista m ON m.id = e.motorista_id
        JOIN carga ca ON ca.id = e.carga_id
        WHERE e.id = ?
    ");

    $stmt->execute([$_GET['id']]);
    $entrega = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* EXCLUIR */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM entrega WHERE id = ?");

    if ($stmt->execute([$id])) {
        header("location: entregas.php?excluir=true");
        exit;
    } else {
        header("location: entregas.php?excluir=false");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consultar Entrega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2>Consultar Entrega</h2>

    <form method="POST">

        <input type="hidden" name="id" value="<?= $entrega['id'] ?>">

        <p><strong>Cliente:</strong> <?= $entrega['cliente'] ?></p>
        <p><strong>Motorista:</strong> <?= $entrega['motorista'] ?></p>
        <p><strong>Carga:</strong> <?= $entrega['carga'] ?></p>
        <p><strong>Data:</strong> <?= $entrega['data_entrega'] ?></p>
        <p><strong>Status:</strong> <?= $entrega['status'] ?></p>

        <p>Deseja excluir esta entrega?</p>

        <button class="btn btn-danger">Excluir</button>
        <a href="entregas.php" class="btn btn-secondary">Voltar</a>

    </form>

</div>

</body>
</html>