<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

try {
    $stmt = $pdo->query("SELECT * FROM motorista");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Motoristas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2>Motoristas</h2>

    <a href="novo_motorista.php" class="btn btn-success mb-3">Novo Motorista</a>
    <a href="principal.php" class="btn btn-secondary mb-3">Voltar</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNH</th>
                <th>Telefone</th>
                <th>Placa do Veículo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($dados as $m) { ?>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= $m['nome'] ?></td>
                <td><?= $m['cnh'] ?></td>
                <td><?= $m['telefone'] ?></td>
                <td><?= $m['placa_veiculo'] ?></td>
                <td>
                    <a href="editar_motorista.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_motorista.php?id=<?= $m['id'] ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>