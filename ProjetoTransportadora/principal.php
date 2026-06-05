<?php
require("cabecalho.php");
?>

<div class="card shadow-sm">

    <div class="card-body">

        <h2 class="mb-3">
            Bem-vindo, <?= $_SESSION['nome'] ?> 👋
        </h2>

        <hr>

        <p class="mb-0">
            Sistema de gerenciamento da transportadora.
        </p>

    </div>

</div>

<?php
require("rodape.php");
?>