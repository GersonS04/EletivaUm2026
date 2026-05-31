<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $cnh = $_POST['cnh'];
    $telefone = $_POST['telefone'];
    $placa = $_POST['placa'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO motorista (nome, cnh, telefone, placa_veiculo)
            VALUES (?, ?, ?, ?)
        ");

        if ($stmt->execute([$nome, $cnh, $telefone, $placa])) {
            header("location: motoristas.php?cadastro=true");
            exit;
        } else {
            header("location: motoristas.php?cadastro=false");
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
    <title>Novo Motorista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Novo Motorista</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>CNH</label>
                <input type="text" name="cnh" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Placa do Veículo</label>
                <input type="text" name="placa" class="form-control" required>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="motoristas.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>