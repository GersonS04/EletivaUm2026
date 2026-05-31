<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR DADOS */
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    try {
        $stmt = $pdo->prepare("SELECT * FROM entrega WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $entrega = $stmt->fetch(PDO::FETCH_ASSOC);

        $clientes = $pdo->query("SELECT * FROM cliente")->fetchAll(PDO::FETCH_ASSOC);
        $motoristas = $pdo->query("SELECT * FROM motorista")->fetchAll(PDO::FETCH_ASSOC);
        $cargas = $pdo->query("SELECT * FROM carga")->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

/* ATUALIZAR */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $motorista = $_POST['motorista'];
    $carga = $_POST['carga'];
    $data = $_POST['data'];
    $status = $_POST['status'];

    try {
        $stmt = $pdo->prepare("
            UPDATE entrega 
            SET cliente_id = ?, motorista_id = ?, carga_id = ?, data_entrega = ?, status = ?
            WHERE id = ?
        ");

        if ($stmt->execute([$cliente, $motorista, $carga, $data, $status, $id])) {
            header("location: entregas.php?editar=true");
            exit;
        } else {
            header("location: entregas.php?editar=false");
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
    <title>Editar Entrega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Editar Entrega</h2>

        <form method="POST">

            <input type="hidden" name="id" value="<?= $entrega['id'] ?>">

            <div class="mb-3">
                <label>Cliente</label>
                <select name="cliente" class="form-control">
                    <?php foreach ($clientes as $c) { ?>
                        <option value="<?= $c['id'] ?>" <?= $c['id'] == $entrega['cliente_id'] ? 'selected' : '' ?>>
                            <?= $c['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Motorista</label>
                <select name="motorista" class="form-control">
                    <?php foreach ($motoristas as $m) { ?>
                        <option value="<?= $m['id'] ?>" <?= $m['id'] == $entrega['motorista_id'] ? 'selected' : '' ?>>
                            <?= $m['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Carga</label>
                <select name="carga" class="form-control">
                    <?php foreach ($cargas as $c) { ?>
                        <option value="<?= $c['id'] ?>" <?= $c['id'] == $entrega['carga_id'] ? 'selected' : '' ?>>
                            <?= $c['descricao'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Data</label>
                <input type="date" name="data" value="<?= $entrega['data_entrega'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option <?= $entrega['status'] == 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option <?= $entrega['status'] == 'Em trânsito' ? 'selected' : '' ?>>Em trânsito</option>
                    <option <?= $entrega['status'] == 'Entregue' ? 'selected' : '' ?>>Entregue</option>
                </select>
            </div>

            <button class="btn btn-primary">Atualizar</button>
            <a href="entregas.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>