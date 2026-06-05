<?php
require("conexao.php");
require("cabecalho.php");

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR DADOS PARA SELECT */
$clientes = $pdo->query("SELECT * FROM cliente")->fetchAll(PDO::FETCH_ASSOC);
$motoristas = $pdo->query("SELECT * FROM motorista")->fetchAll(PDO::FETCH_ASSOC);
$cargas = $pdo->query("SELECT * FROM carga")->fetchAll(PDO::FETCH_ASSOC);

/* INSERT */
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

<div class="container">

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-4">Nova Entrega</h2>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente" class="form-control" required>
                        <option value="">Selecione</option>
                        <?php foreach ($clientes as $c) { ?>
                            <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Motorista</label>
                    <select name="motorista" class="form-control" required>
                        <option value="">Selecione</option>
                        <?php foreach ($motoristas as $m) { ?>
                            <option value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Carga</label>
                    <select name="carga" class="form-control" required>
                        <option value="">Selecione</option>
                        <?php foreach ($cargas as $c) { ?>
                            <option value="<?= $c['id'] ?>"><?= $c['descricao'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data da Entrega</label>
                    <input type="date" name="data" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
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

    </div>

</div>

<?php require("rodape.php"); ?>