<?php
session_start();

require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['acesso'] = true;
            $_SESSION['nome'] = $usuario['nome'];

            header("location: principal.php");
            exit;
        } else {
            $erro = "Email ou senha inválidos!";
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
    <title>Login - Transportadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width: 400px;">

        <h3 class="mb-3">Login do Sistema</h3>

        <?php if (isset($erro)) { ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Entrar</button>

        </form>

        <p class="mt-3 text-center">
            Não tem conta? <a href="cadastro.php">Cadastrar</a>
        </p>

    </div>

</body>

</html>