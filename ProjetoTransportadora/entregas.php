<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

try {

    $stmt = $pdo->query("
        SELECT 
            e.id,
            c.nome AS cliente,
            m.nome AS motorista,
            ca.descricao AS carga,
            e.data_entrega,
            e.status
        FROM entrega e
        INNER JOIN cliente c ON c.id = e.cliente_id
        INNER JOIN motorista m ON m.id = e.motorista_id
        INNER JOIN carga ca ON ca.id = e.carga_id
    ");

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Entregas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2>Entregas</h2>

    <a href="nova_entrega.php" class="btn btn-success mb-3">Nova Entrega</a>
    <a href="principal.php" class="btn btn-secondary mb-3">Voltar</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Motorista</th>
                <th>Carga</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($dados as $e) { ?>
            <tr>
                <td><?= $e['id'] ?></td>
                <td><?= $e['cliente'] ?></td>
                <td><?= $e['motorista'] ?></td>
                <td><?= $e['carga'] ?></td>
                <td><?= $e['data_entrega'] ?></td>
                <td><?= $e['status'] ?></td>
                <td>
                    <a href="editar_entrega.php?id=<?= $e['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_entrega.php?id=<?= $e['id'] ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>