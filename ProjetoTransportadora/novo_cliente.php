<?php
require("conexao.php");

session_start();

if (!isset($_SESSION['acesso'])) {
    header("location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    try {

        $stmt = $pdo->prepare("
            INSERT INTO cliente (nome, cpf, telefone, email)
            VALUES (?, ?, ?, ?)
        ");

        if ($stmt->execute([$nome, $cpf, $telefone, $email])) {
            header("location: clientes.php?cadastro=true");
            exit;
        } else {
            header("location: clientes.php?cadastro=false");
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

                <h2 class="mb-4">Novo Cliente</h2>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Salvar
                    </button>

                    <a href="clientes.php" class="btn btn-secondary w-100 mt-2">
                        Voltar
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require("rodape.php"); ?>