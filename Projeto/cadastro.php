<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 100%; max-width: 450px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">Criar Conta</h3>
            <form>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Digite seu nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="seu@email.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" placeholder="Mínimo 6 caracteres" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">Eu aceito os termos e condições</label>
                </div>
                <button type="submit" class="btn btn-success w-100">Finalizar Cadastro</button>
            </form>
            <div class="text-center mt-3">
                <p class="small">Já possui conta? <a href="login.html">Faça login</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>