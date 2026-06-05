<?php
require("conexao.php");

session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $cnh = $_POST['cnh'];
    $telefone = $_POST['telefone'];
    $placa = $_POST['placa'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO motorista (nome, cnh, telefone, placa_veiculo)
            VALUES (?, ?, ?, ?)
        ");

        if ($stmt->execute([$nome, $cnh, $telefone, $placa])) {
            header("location: motoristas.php?cadastro=true");
            exit;
        } else {
            header("location: motoristas.php?cadastro=false");
            exit;
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<?php require("cabecalho.php"); ?>

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4">Novo Motorista</h2>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CNH</label>
                        <input type="text" name="cnh" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Placa do Veículo</label>
                        <input type="text" name="placa" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Salvar
                    </button>

                    <a href="motoristas.php" class="btn btn-secondary w-100 mt-2">
                        Voltar
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require("rodape.php"); ?>