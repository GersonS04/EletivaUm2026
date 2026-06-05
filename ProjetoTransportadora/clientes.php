<?php
require("conexao.php");
require("cabecalho.php");

try {
    $stmt = $pdo->query("SELECT * FROM cliente");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2 class="mb-0">Clientes</h2>

            <a href="novo_cliente.php" class="btn btn-success">
                + Novo Cliente
            </a>

        </div>

        <?php if (count($dados) == 0) { ?>

            <div class="alert alert-info">
                Nenhum cliente cadastrado.
            </div>

        <?php } else { ?>

            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($dados as $c) { ?>

                        <tr>

                            <td><?= $c['id'] ?></td>
                            <td><?= $c['nome'] ?></td>
                            <td><?= $c['cpf'] ?></td>
                            <td><?= $c['telefone'] ?></td>
                            <td><?= $c['email'] ?></td>

                            <td class="d-flex gap-1">

                                <a href="editar_cliente.php?id=<?= $c['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <a href="consultar_cliente.php?id=<?= $c['id'] ?>"
                                    class="btn btn-info btn-sm">
                                    Consultar
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        <?php } ?>

    </div>

</div>

<?php require("rodape.php"); ?>