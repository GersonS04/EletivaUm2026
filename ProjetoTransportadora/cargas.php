<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

try {
    $stmt = $pdo->query("SELECT * FROM carga");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cargas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2>Cargas</h2>

    <a href="nova_carga.php" class="btn btn-success mb-3">Nova Carga</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Peso</th>
                <th>Valor do Frete</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($dados as $c) { ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['descricao'] ?></td>
                <td><?= $c['peso'] ?></td>
                <td><?= $c['valor_frete'] ?></td>
                <td>
                    <a href="editar_carga.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_carga.php?id=<?= $c['id'] ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>