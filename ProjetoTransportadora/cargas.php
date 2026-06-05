<?php
require("conexao.php");
require("cabecalho.php");

try {
    $stmt = $pdo->query("SELECT * FROM carga");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2 class="mb-0">Cargas</h2>

            <a href="nova_carga.php" class="btn btn-success">
                + Nova Carga
            </a>

        </div>

        <?php if (count($dados) == 0) { ?>

            <div class="alert alert-info">
                Nenhuma carga cadastrada.
            </div>

        <?php } else { ?>

            <table class="table table-hover table-striped align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Peso (Kg)</th>
                        <th>Valor do Frete</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($dados as $c) { ?>

                        <tr>

                            <td><?= $c['id'] ?></td>
                            <td><?= $c['descricao'] ?></td>
                            <td><?= $c['peso'] ?></td>
                            <td>R$ <?= number_format($c['valor_frete'], 2, ',', '.') ?></td>

                            <td class="d-flex gap-1">

                                <a href="editar_carga.php?id=<?= $c['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <a href="consultar_carga.php?id=<?= $c['id'] ?>"
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