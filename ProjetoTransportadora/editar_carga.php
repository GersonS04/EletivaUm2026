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

/* ATUALIZAR */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $valor = $_POST['valor_frete'];

    try {

        $stmt = $pdo->prepare("
            UPDATE carga 
            SET descricao = ?, peso = ?, valor_frete = ?
            WHERE id = ?
        ");

        if ($stmt->execute([$descricao, $peso, $valor, $id])) {
            header("location: cargas.php?editar=true");
            exit;
        } else {
            header("location: cargas.php?editar=false");
            exit;
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <h2 class="mb-4">Editar Carga</h2>

        <form method="POST">

            <input type="hidden" name="id" value="<?= $carga['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <input type="text"
                    name="descricao"
                    value="<?= $carga['descricao'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Peso (Kg)</label>
                <input type="number"
                    step="0.01"
                    name="peso"
                    value="<?= $carga['peso'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor do Frete</label>
                <input type="number"
                    step="0.01"
                    name="valor_frete"
                    value="<?= $carga['valor_frete'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="d-flex gap-2">

                <button class="btn btn-primary">
                    Atualizar
                </button>

                <a href="cargas.php" class="btn btn-secondary">
                    Voltar
                </a>

            </div>

        </form>

    </div>

</div>

<?php require("rodape.php"); ?>