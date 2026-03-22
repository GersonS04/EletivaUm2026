<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercicio 4 - Lista de itens ordenados.</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o nome do primeiro item:</label>
                <input type="text" id="nome1" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor[]" class="form-label">Informe o valor dele:</label>
                <input type="number" step="0.01" id="valor1" name="valor[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o nome do segundo item:</label>
                <input type="text" id="nome2" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor[]" class="form-label">Informe o valor dele:</label>
                <input type="number" step="0.01" id="valor2" name="valor[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o nome do terceiro item:</label>
                <input type="text" id="nome3" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor[]" class="form-label">Informe o valor dele:</label>
                <input type="number" step="0.01" id="valor3" name="valor[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o nome do quarto item:</label>
                <input type="text" id="nome4" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor[]" class="form-label">Informe o valor dele:</label>
                <input type="number" step="0.01" id="valor4" name="valor[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o nome do quinto item:</label>
                <input type="text" id="nome5" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor[]" class="form-label">Informe o valor dele:</label>
                <input type="number" step="0.01" id="valor5" name="valor[]" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nomes = $_POST['nome'];
            $precos = $_POST['valor'];

            $mapa = [];

            for($i = 0; $i < count($precos); $i++)
            {
                $precos[$i] = $precos[$i] * 1.15; 
            }

            for($i = 0; $i < 5; $i++)
            {
                $nome = $nomes[$i];
                $preco = $precos[$i];

                $mapa[$nome] = ['preco' => $preco];
            }

            uasort($mapa, function ($a, $b) 
            {
                return $a['preco'] <=> $b['preco'];
            });

            foreach ($mapa as $nome => $itens )
            {
                echo "Nome: " . $nome . " Preço: " . $itens['preco'] . "<br>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>