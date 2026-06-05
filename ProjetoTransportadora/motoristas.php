<?php
require("conexao.php");
require("cabecalho.php");

try {
    $stmt = $pdo->query("SELECT * FROM motorista");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2 class="mb-0">Motoristas</h2>

            <a href="novo_motorista.php" class="btn btn-success">
                + Novo Motorista
            </a>

        </div>

        <?php if (count($dados) == 0) { ?>

            <div class="alert alert-info">
                Nenhum motorista cadastrado.
            </div>

        <?php } else { ?>

            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CNH</th>
                        <th>Telefone</th>
                        <th>Placa</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($dados as $m) { ?>

                        <tr>

                            <td><?= $m['id'] ?></td>
                            <td><?= $m['nome'] ?></td>
                            <td><?= $m['cnh'] ?></td>
                            <td><?= $m['telefone'] ?></td>
                            <td><?= $m['placa_veiculo'] ?></td>

                            <td class="d-flex gap-1">

                                <a href="editar_motorista.php?id=<?= $m['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <a href="consultar_motorista.php?id=<?= $m['id'] ?>"
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