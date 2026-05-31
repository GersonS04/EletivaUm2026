<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR DADOS PARA SELECT */
$clientes = $pdo->query("SELECT * FROM cliente")->fetchAll(PDO::FETCH_ASSOC);
$motoristas = $pdo->query("SELECT * FROM motorista")->fetchAll(PDO::FETCH_ASSOC);
$cargas = $pdo->query("SELECT * FROM carga")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $cliente = $_POST['cliente'];
    $motorista = $_POST['motorista'];
    $carga = $_POST['carga'];
    $data = $_POST['data'];
    $status = $_POST['status'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO entrega (cliente_id, motorista_id, carga_id, data_entrega, status)
            VALUES (?, ?, ?, ?, ?)
        ");

        if ($stmt->execute([$cliente, $motorista, $carga, $data, $status])) {
            header("location: entregas.php?cadastro=true");
            exit;
        } else {
            header("location: entregas.php?cadastro=false");
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
    <title>Nova Entrega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h2>Nova Entrega</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Cliente</label>
                <select name="cliente" class="form-control" required>
                    <option value="">Selecione</option>
                    <?php foreach ($clientes as $c) { ?>
                        <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Motorista</label>
                <select name="motorista" class="form-control" required>
                    <option value="">Selecione</option>
                    <?php foreach ($motoristas as $m) { ?>
                        <option value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Carga</label>
                <select name="carga" class="form-control" required>
                    <option value="">Selecione</option>
                    <?php foreach ($cargas as $c) { ?>
                        <option value="<?= $c['id'] ?>"><?= $c['descricao'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Data da Entrega</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pendente">Pendente</option>
                    <option value="Em trânsito">Em trânsito</option>
                    <option value="Entregue">Entregue</option>
                </select>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="entregas.php" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>