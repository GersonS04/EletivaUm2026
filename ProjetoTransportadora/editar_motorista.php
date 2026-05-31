<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR MOTORISTA */
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    try {
        $stmt = $pdo->prepare("SELECT * FROM motorista WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $motorista = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

/* ATUALIZAR */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cnh = $_POST['cnh'];
    $telefone = $_POST['telefone'];
    $placa = $_POST['placa'];

    try {

        $stmt = $pdo->prepare("
            UPDATE motorista 
            SET nome = ?, cnh = ?, telefone = ?, placa_veiculo = ?
            WHERE id = ?
        ");

        if ($stmt->execute([$nome, $cnh, $telefone, $placa, $id])) {
            header("location: motoristas.php?editar=true");
            exit;
        } else {
            header("location: motoristas.php?editar=false");
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
    <title>Editar Motorista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Editar Motorista</h2>

        <form method="POST">

            <input type="hidden" name="id" value="<?= $motorista['id'] ?>">

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" value="<?= $motorista['nome'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>CNH</label>
                <input type="text" name="cnh" value="<?= $motorista['cnh'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone" value="<?= $motorista['telefone'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Placa do Veículo</label>
                <input type="text" name="placa" value="<?= $motorista['placa_veiculo'] ?>" class="form-control" required>
            </div>

            <button class="btn btn-primary">Atualizar</button>
            <a href="motoristas.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>