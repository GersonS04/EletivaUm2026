<?php
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {

        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");

        if ($stmt->execute([$nome, $email, $senha])) {
            header("location: index.php?cadastro=true");
            exit;
        } else {
            header("location: index.php?cadastro=false");
            exit;
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<?php require("cabecalho.php"); ?>

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4 text-center">Cadastro de Usuário</h2>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Cadastrar
                    </button>

                </form>

                <div class="text-center mt-3">
                    <a href="index.php">Voltar para login</a>
                </div>

            </div>

        </div>

    </div>

</div>

<?php require("rodape.php"); ?>