<?php
require("conexao.php");
require("cabecalho.php");

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

/* INSERT */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $valor = $_POST['valor'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO carga (descricao, peso, valor_frete)
            VALUES (?, ?, ?)
        ");

        if ($stmt->execute([$descricao, $peso, $valor])) {
            header("location: cargas.php?cadastro=true");
            exit;
        } else {
            header("location: cargas.php?cadastro=false");
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

            <h2 class="mb-4">Nova Carga</h2>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Peso</label>
                    <input type="number" step="0.01" name="peso" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Valor do Frete</label>
                    <input type="number" step="0.01" name="valor" class="form-control" required>
                </div>

                <button class="btn btn-success">Salvar</button>
                <a href="cargas.php" class="btn btn-secondary">Voltar</a>

            </form>

        </div>

    </div>

</div>

<?php require("rodape.php"); ?>