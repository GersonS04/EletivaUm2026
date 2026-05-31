<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO cliente (nome, cpf, telefone, email)
            VALUES (?, ?, ?, ?)
        ");

        if ($stmt->execute([$nome, $cpf, $telefone, $email])) {
            header("location: clientes.php?cadastro=true");
            exit;
        } else {
            header("location: clientes.php?cadastro=false");
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
    <title>Novo Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Novo Cliente</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="clientes.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>