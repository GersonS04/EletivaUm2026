<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR CLIENTE */
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    try {
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

/* EXCLUIR CLIENTE */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM cliente WHERE id = ?");

        if ($stmt->execute([$id])) {
            header("location: clientes.php?excluir=true");
            exit;
        } else {
            header("location: clientes.php?excluir=false");
            exit;
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Consultar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Consultar Cliente</h2>

        <form method="POST">

            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" value="<?= $cliente['nome'] ?>" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label>CPF</label>
                <input type="text" value="<?= $cliente['cpf'] ?>" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" value="<?= $cliente['telefone'] ?>" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" value="<?= $cliente['email'] ?>" class="form-control" disabled>
            </div>

            <p>Deseja realmente excluir este cliente?</p>

            <button class="btn btn-danger">Excluir</button>
            <a href="clientes.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>