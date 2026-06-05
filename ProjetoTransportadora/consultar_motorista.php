<?php
require("conexao.php");
require("cabecalho.php");

/* BUSCAR MOTORISTA */
try {
    $stmt = $pdo->prepare("SELECT * FROM motorista WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $motorista = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

/* EXCLUIR MOTORISTA */
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
    } catch (PDOException $e) {

        if ($e->getCode() == 23000) {

            echo "
            <div class='container'>
                <div class='alert alert-danger mt-3'>
                    Não é possível excluir este motorista porque ele está vinculado a uma entrega.
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

        <h2 class="mb-4">Consultar Motorista</h2>

        <form method="POST" id="formExcluir">

            <input type="hidden" name="id" value="<?= $motorista['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" value="<?= $motorista['nome'] ?>" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">CNH</label>
                <input type="text" value="<?= $motorista['cnh'] ?>" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" value="<?= $motorista['telefone'] ?>" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Placa do Veículo</label>
                <input type="text" value="<?= $motorista['placa_veiculo'] ?>" class="form-control" disabled>
            </div>

            <div class="d-flex gap-2 mt-4">

                <button type="button"
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modalExcluir">
                    Excluir
                </button>

                <a href="motoristas.php" class="btn btn-secondary">
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

                Tem certeza que deseja excluir este motorista?

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