<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR */
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    try {
        $stmt = $pdo->prepare("SELECT * FROM motorista WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $motorista = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

/* EXCLUIR */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];

    try {

        $stmt = $pdo->prepare("DELETE FROM motorista WHERE id = ?");

        if ($stmt->execute([$id])) {
            header("location: motoristas.php?excluir=true");
            exit;
        } else {
            header("location: motoristas.php?excluir=false");
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
    <title>Consultar Motorista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2>Consultar Motorista</h2>

    <form method="POST">

        <input type="hidden" name="id" value="<?= $motorista['id'] ?>">

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" value="<?= $motorista['nome'] ?>" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label>CNH</label>
            <input type="text" value="<?= $motorista['cnh'] ?>" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" value="<?= $motorista['telefone'] ?>" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label>Placa</label>
            <input type="text" value="<?= $motorista['placa_veiculo'] ?>" class="form-control" disabled>
        </div>

        <p>Deseja realmente excluir este motorista?</p>

        <button class="btn btn-danger">Excluir</button>
        <a href="motoristas.php" class="btn btn-secondary">Voltar</a>

    </form>

</div>

</body>
</html>