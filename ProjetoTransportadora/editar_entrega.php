<?php
require("conexao.php");
require("cabecalho.php");

/* VALIDA ID */
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("location: entregas.php");
    exit;
}

/* BUSCAR ENTREGA */
try {

    $stmt = $pdo->prepare("SELECT * FROM entrega WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $entrega = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$entrega) {
        header("location: entregas.php?erro=naoencontrado");
        exit;
    }

    $clientes = $pdo->query("SELECT * FROM cliente")->fetchAll(PDO::FETCH_ASSOC);
    $motoristas = $pdo->query("SELECT * FROM motorista")->fetchAll(PDO::FETCH_ASSOC);
    $cargas = $pdo->query("SELECT * FROM carga")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
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

<div class="card shadow-sm">

    <div class="card-body">

        <h2 class="mb-4">Editar Entrega</h2>

        <form method="POST">

            <input type="hidden" name="id" value="<?= $entrega['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <select name="cliente" class="form-control" required>
                    <?php foreach ($clientes as $c) { ?>
                        <option value="<?= $c['id'] ?>"
                            <?= $c['id'] == $entrega['cliente_id'] ? 'selected' : '' ?>>
                            <?= $c['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Motorista</label>
                <select name="motorista" class="form-control" required>
                    <?php foreach ($motoristas as $m) { ?>
                        <option value="<?= $m['id'] ?>"
                            <?= $m['id'] == $entrega['motorista_id'] ? 'selected' : '' ?>>
                            <?= $m['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Carga</label>
                <select name="carga" class="form-control" required>
                    <?php foreach ($cargas as $c) { ?>
                        <option value="<?= $c['id'] ?>"
                            <?= $c['id'] == $entrega['carga_id'] ? 'selected' : '' ?>>
                            <?= $c['descricao'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="date"
                    name="data"
                    value="<?= $entrega['data_entrega'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option <?= $entrega['status'] == 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option <?= $entrega['status'] == 'Em trânsito' ? 'selected' : '' ?>>Em trânsito</option>
                    <option <?= $entrega['status'] == 'Entregue' ? 'selected' : '' ?>>Entregue</option>
                </select>
            </div>

            <div class="d-flex gap-2">

                <button class="btn btn-primary">
                    Atualizar
                </button>

                <a href="entregas.php" class="btn btn-secondary">
                    Voltar
                </a>

            </div>

        </form>

    </div>

</div>

<?php require("rodape.php"); ?>