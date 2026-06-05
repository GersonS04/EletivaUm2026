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
    <link href="style.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center align-items-center" style="height: 100vh;">

            <div class="col-md-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h2 class="text-center mb-2">🚚 Transportadora</h2>

                        <p class="text-center text-muted mb-4">
                            Login do Sistema
                        </p>

                        <?php if (isset($erro)) { ?>
                            <div class="alert alert-danger">
                                <?= $erro ?>
                            </div>
                        <?php } ?>

                        <form method="POST">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" required>
                            </div>

                            <button class="btn btn-primary w-100">
                                Entrar
                            </button>

                        </form>

                        <div class="text-center mt-3">
                            <small>
                                Não tem conta?
                                <a href="cadastro.php">Criar conta</a>
                            </small>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>