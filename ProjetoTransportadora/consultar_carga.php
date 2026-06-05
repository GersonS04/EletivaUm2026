<?php
require("conexao.php");
require("cabecalho.php");

/* BUSCAR CARGA */
try {
    $stmt = $pdo->prepare("SELECT * FROM carga WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $carga = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

/* EXCLUIR CARGA */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];

    try {

        $stmt = $pdo->prepare("DELETE FROM carga WHERE id = ?");

        if ($stmt->execute([$id])) {
            header("location: cargas.php?excluir=true");
            exit;
        } else {
            header("location: cargas.php?excluir=false");
            exit;
        }
    } catch (PDOException $e) {

        if ($e->getCode() == 23000) {

            echo "
            <div class='container'>
                <div class='alert alert-danger mt-3'>
                    Não é possível excluir esta carga porque ela está vinculada a uma entrega.
                </div>
            </div>";
        } else {
            echo "Erro: " . $e->getMessage();
        }
    }
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <h2 class="mb-4">Consultar Carga</h2>

        <form method="POST" id="formExcluir">

            <input type="hidden" name="id" value="<?= $carga['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <input type="text"
                    class="form-control"
                    value="<?= $carga['descricao'] ?>"
                    disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Peso (Kg)</label>
                <input type="text"
                    class="form-control"
                    value="<?= $carga['peso'] ?>"
                    disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor do Frete</label>
                <input type="text"
                    class="form-control"
                    value="R$ <?= number_format($carga['valor_frete'], 2, ',', '.') ?>"
                    disabled>
            </div>

            <div class="d-flex gap-2 mt-4">

                <button type="button"
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modalExcluir">
                    Excluir
                </button>

                <a href="cargas.php" class="btn btn-secondary">
                    Voltar
                </a>

            </div>

        </form>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">
                    Confirmar Exclusão
                </h5>

                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                Tem certeza que deseja excluir esta carga?

                <div class="text-muted mt-2">
                    Esta ação não poderá ser desfeita.
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancelar
                </button>

                <button type="button"
                    class="btn btn-danger"
                    onclick="document.getElementById('formExcluir').submit();">
                    Sim, excluir
                </button>

            </div>

        </div>

    </div>

</div>

<?php require("rodape.php"); ?>