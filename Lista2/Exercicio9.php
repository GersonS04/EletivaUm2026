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
        <h1>Exercício 9 - Área do círculo:</h1>
        <form method="post">
            <div class="mb-3">
                <label for="Raio" class="form-label">Informe o raio do círculo (cm): </label>
                <input type="number" id="Raio" name="Raio" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $Raio = $_POST['Raio'];

            $Area = ($Raio ** 2) * 3.14;

            echo "A círculo tem uma área de $Area cm. (Considerando π = 3,14)";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>