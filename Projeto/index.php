<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">Sistema de Controle de Estoque</h3>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="nome@exemplo.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" border for="remember">Lembrar de mim</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
            <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $email = $_POST['email'];
                $senha = $_POST['password'];

                if($email == "adm@adm" && $senha == '123'){
                    $_SESSION['nome'] = 'Administrador';
                    $_SESSION['acesso'] = true;
                    header('Location: principal.php');
                } else{
                    $_SESSION['acesso'] = false;
                    echo "<p class='text-danger'>Email e/ou Senha incorretos!</p>";
                }
            }
            ?>
            <div class="text-center mt-3">
                <p class="small">Não tem uma conta? <a href="cadastro.html">Cadastre-se</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>