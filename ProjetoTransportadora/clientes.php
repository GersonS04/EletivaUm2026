<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

try {
    $stmt = $pdo->query("SELECT * FROM cliente");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2>Clientes</h2>

    <a href="novo_cliente.php" class="btn btn-success mb-3">Novo Cliente</a>
    <a href="principal.php" class="btn btn-secondary mb-3">Voltar</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($dados as $c) { ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['nome'] ?></td>
                <td><?= $c['cpf'] ?></td>
                <td><?= $c['telefone'] ?></td>
                <td><?= $c['email'] ?></td>
                <td>
                    <a href="editar_cliente.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_cliente.php?id=<?= $c['id'] ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>