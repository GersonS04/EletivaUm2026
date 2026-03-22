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
        <h1>Exercicio 5 - Lista de livros ordenados</h1>
        <form method="post">
            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do primeiro livro:</label>
                <input type="text" id="titulo1" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque:</label>
                <input type="number" id="qtde1" name="qtde[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do segundo livro:</label>
                <input type="text" id="titulo2" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque:</label>
                <input type="number" id="qtde2" name="qtde[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do terceiro livro:</label>
                <input type="text" id="titulo3" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque:</label>
                <input type="number" id="qtde3" name="qtde[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do quarto livro:</label>
                <input type="text" id="titulo4" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque:</label>
                <input type="number" id="qtde4" name="qtde[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do quinto livro:</label>
                <input type="text" id="titulo5" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque:</label>
                <input type="number" id="qtde5" name="qtde[]" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $titulos = $_POST['titulo'];
            $qtdes = $_POST['qtde'];

            $mapa = [];

            for($i = 0; $i < 5; $i++)
            {
                $titulo = $titulos[$i];
                $qtde = $qtdes[$i];

                $mapa[$titulo] = ['qtde' => $qtde];
            }

            ksort($mapa);

            foreach($mapa as $titulo => $livros)
            {
                if($livros['qtde'] < 5)
                {
                    echo "Título: " . $titulo . " --> Quantidade: " . $livros['qtde'] . "<br>";
                    echo "<b>Estoque Baixo! Verificar Devoluções ou necessidade de compra!</b><p></p>";
                }
                else
                {
                    echo "<p>Título: " . $titulo . " --> Quantidade: " . $livros['qtde'] . "</p>";
                }
            }

        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>