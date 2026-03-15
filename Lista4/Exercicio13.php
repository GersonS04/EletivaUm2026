<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 13 - Total de Palavras e Maior delas</h1>
        <form method="post">
            <div class="mb-3">
                <label for="frase" class="form-label">Digite uma frase:</label>
                <input type="text" id="frase" name="frase" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $frase = $_POST['frase'];

            $qtde = str_word_count($frase);

            $palavras = explode(" ", $frase);
            $maior = "";

            foreach ($palavras as $p)
            {
                if (strlen($p) > strlen($maior))
                {
                    $maior = $p;
                }
            }
            echo "Total de palavras: $qtde";
            echo "<p>Maior palavra = $maior </p>";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>