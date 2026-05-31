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

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width: 450px;">

        <h3 class="mb-3">Cadastro de Usuário</h3>

        <form method="POST">

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Cadastrar</button>

        </form>

        <p class="mt-3 text-center">
            <a href="index.php">Voltar para login</a>
        </p>

    </div>

</body>

</html>