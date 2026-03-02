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
        <h1>Exercício 16 - Calculadora de Desconto</h1>
        <form method="post">
            <div class="mb-3">
                <label for="preco" class="form-label">Informe o preço:</label>
                <input type="number" id="preco" name="preco" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Informe o percentual de desconto:</label>
                <input type="number" id="desc" name="desc" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $preco = $_POST['preco'];
            $desc = $_POST['desc'];

            $valor = $preco - ($preco * $desc / 100);

            echo "O valor com desconto é de $valor reais";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>