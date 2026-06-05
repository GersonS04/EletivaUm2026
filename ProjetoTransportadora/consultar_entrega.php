<?php
require("conexao.php");
require("cabecalho.php");

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* BUSCAR ENTREGA */
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    try {

        $stmt = $pdo->prepare("
            SELECT e.*, c.nome AS cliente, m.nome AS motorista, ca.descricao AS carga
            FROM entrega e
            JOIN cliente c ON c.id = e.cliente_id
            JOIN motorista m ON m.id = e.motorista_id
            JOIN carga ca ON ca.id = e.carga_id
            WHERE e.id = ?
        ");

        $stmt->execute([$_GET['id']]);
        $entrega = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

/* EXCLUIR ENTREGA */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];

    try {

        $stmt = $pdo->prepare("DELETE FROM entrega WHERE id = ?");

        if ($stmt->execute([$id])) {
            header("location: entregas.php?excluir=true");
            exit;
        } else {
            header("location: entregas.php?excluir=false");
            exit;
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<div class="container mt-4">

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-4">Consultar Entrega</h2>

            <form method="POST" id="formExcluir">

                <input type="hidden" name="id" value="<?= $entrega['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" class="form-control" value="<?= $entrega['cliente'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Motorista</label>
                    <input type="text" class="form-control" value="<?= $entrega['motorista'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Carga</label>
                    <input type="text" class="form-control" value="<?= $entrega['carga'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data da Entrega</label>
                    <input type="text"
                        class="form-control"
                        value="<?= date('d/m/Y', strtotime($entrega['data_entrega'])) ?>"
                        disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text"
                        class="form-control"
                        value="<?= ucfirst($entrega['status']) ?>"
                        disabled>
                </div>

                <div class="d-flex gap-2 mt-4">

                    <button
                        type="button"
                        class="btn btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalExcluir">
                        Excluir
                    </button>

                    <a href="entregas.php" class="btn btn-secondary">
                        Voltar
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">Confirmar Exclusão</h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">
                Tem certeza que deseja excluir esta entrega?
                <div class="text-muted mt-2">
                    Esta ação não poderá ser desfeita.
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>

                <button type="button" class="btn btn-danger"
                    onclick="document.getElementById('formExcluir').submit();">
                    Sim, excluir
                </button>

            </div>

        </div>

    </div>

</div>

<?php require("rodape.php"); ?>