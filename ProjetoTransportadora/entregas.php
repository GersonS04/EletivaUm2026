<?php
require("conexao.php");
require("cabecalho.php");

try {

    $stmt = $pdo->query("
        SELECT 
            e.id,
            c.nome AS cliente,
            m.nome AS motorista,
            ca.descricao AS carga,
            e.data_entrega,
            e.status
        FROM entrega e
        INNER JOIN cliente c ON c.id = e.cliente_id
        INNER JOIN motorista m ON m.id = e.motorista_id
        INNER JOIN carga ca ON ca.id = e.carga_id
    ");

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2 class="mb-0">Entregas</h2>

            <a href="nova_entrega.php" class="btn btn-success">
                + Nova Entrega
            </a>

        </div>

        <?php if (count($dados) == 0) { ?>

            <div class="alert alert-info">
                Nenhuma entrega cadastrada.
            </div>

        <?php } else { ?>

            <table class="table table-hover table-striped align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Motorista</th>
                        <th>Carga</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($dados as $e) { ?>

                        <tr>

                            <td><?= $e['id'] ?></td>
                            <td><?= $e['cliente'] ?></td>
                            <td><?= $e['motorista'] ?></td>
                            <td><?= $e['carga'] ?></td>
                            <td><?= $e['data_entrega'] ?></td>
                            <td>
                                <span class="badge bg-secondary">
                                    <?= $e['status'] ?>
                                </span>
                            </td>

                            <td class="d-flex gap-1">

                                <a href="editar_entrega.php?id=<?= $e['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <a href="consultar_entrega.php?id=<?= $e['id'] ?>"
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