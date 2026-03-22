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
        <h1>Exercicio 3 - Lista de produtos ordenados.</h1>
        <form method="post">
            <div class="mb-3">
                <label for="cod[]" class="form-label">Informe o código do primeiro produto:</label>
                <input type="number" id="cod1" name="cod[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o seu nome:</label>
                <input type="text" id="nome1" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Informe o seu preço:</label>
                <input type="number" step="0.01" id="preco1" name="preco[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="cod[]" class="form-label">Informe o código do segundo produto:</label>
                <input type="number" id="cod2" name="cod[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o seu nome:</label>
                <input type="text" id="nome2" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Informe o seu preço:</label>
                <input type="number" step="0.01" id="preco2" name="preco[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="cod[]" class="form-label">Informe o código do terceiro produto:</label>
                <input type="number" id="cod3" name="cod[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o seu nome:</label>
                <input type="text" id="nome3" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Informe o seu preço:</label>
                <input type="number" step="0.01" id="preco3" name="preco[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="cod[]" class="form-label">Informe o código do quarto produto:</label>
                <input type="number" id="cod4" name="cod[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o seu nome:</label>
                <input type="text" id="nome4" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Informe o seu preço:</label>
                <input type="number" step="0.01" id="preco4" name="preco[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="cod[]" class="form-label">Informe o código do quinto produto:</label>
                <input type="number" id="cod5" name="cod[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome[]" class="form-label">Informe o seu nome:</label>
                <input type="text" id="nome5" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Informe o seu preço:</label>
                <input type="number" step="0.01" id="preco5" name="preco[]" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $codigos = $_POST['cod'];
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];

            for ($i = 0; $i < count($precos); $i++)
            {
                if ($precos[$i] > 100)
                {
                    $precos[$i] = $precos[$i] * 0.90;
                }
            }

            $mapa = [];

            for ($i = 0; $i < 5; $i++)
            {
                $codigo = $codigos[$i];
                $nome = $nomes[$i];
                $preco = $precos[$i];

                $mapa[$codigo] = ["nome" => $nome, "preco" => $preco];    
            }
            uasort($mapa, function ($a, $b) 
            {
                return strcmp($a['nome'], $b['nome']);
            });
            
            foreach ($mapa as $codigo => $produto)
            {
                echo "Código: $codigo " . "Nome: " . $produto['nome'] . " Preço: " . $produto['preco'] . "<br>";
            }
        }
        ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>