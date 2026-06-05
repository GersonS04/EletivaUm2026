<?php
require("conexao.php");
require("cabecalho.php");

/* BUSCAR DADOS DO CLIENTE */
try {
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

/* ATUALIZAR DADOS */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    try {
        $stmt = $pdo->prepare("
            UPDATE cliente 
            SET nome = ?, cpf = ?, telefone = ?, email = ?
            WHERE id = ?
        ");

        if ($stmt->execute([$nome, $cpf, $telefone, $email, $id])) {
            header("location: clientes.php?editar=true");
            exit;
        } else {
            header("location: clientes.php?editar=false");
            exit;
        }

    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <h2 class="mb-4">Editar Cliente</h2>

        <form method="POST">

            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text"
                       name="nome"
                       value="<?= $cliente['nome'] ?>"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text"
                       name="cpf"
                       value="<?= $cliente['cpf'] ?>"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text"
                       name="telefone"
                       value="<?= $cliente['telefone'] ?>"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       value="<?= $cliente['email'] ?>"
                       class="form-control"
                       required>
            </div>

            <div class="d-flex gap-2">

                <button class="btn btn-primary">
                    Atualizar
                </button>

                <a href="clientes.php" class="btn btn-secondary">
                    Voltar
                </a>

            </div>

        </form>

    </div>

</div>

<?php require("rodape.php"); ?>