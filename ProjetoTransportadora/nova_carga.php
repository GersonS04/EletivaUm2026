<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $valor = $_POST['valor'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO carga (descricao, peso, valor_frete)
            VALUES (?, ?, ?)
        ");

        if ($stmt->execute([$descricao, $peso, $valor])) {
            header("location: cargas.php?cadastro=true");
            exit;
        } else {
            header("location: cargas.php?cadastro=false");
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
    <title>Nova Carga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Nova Carga</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Descrição</label>
                <input type="text" name="descricao" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Peso</label>
                <input type="number" step="0.01" name="peso" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Valor do Frete</label>
                <input type="number" step="0.01" name="valor" class="form-control" required>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="cargas.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>