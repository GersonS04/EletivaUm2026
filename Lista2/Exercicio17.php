<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 17 - Calculadora de juros simples:</h1>
        <form method="post">
            <div class="mb-3">
                <label for="capital" class="form-label">Informe o capital:</label>
                <input type="number" id="capital" name="capital" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="juros" class="form-label">Informe a taxa de juros:</label>
                <input type="text" id="juros" name="juros" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="tempo" class="form-label">Informe o periodo (meses):</label>
                <input type="text" id="tempo" name="tempo" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $Capital = $_POST['capital'];
            $Juros = $_POST['juros'];
            $Tempo = $_POST['tempo'];

            $ValorSimples = $Capital * ($Juros / 100) * $Tempo;

            echo "O valor total dos juros simples é de $ValorSimples reais";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>