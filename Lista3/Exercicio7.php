<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 7 - Soma valores ordenados até o limite escolhido</h1>
        <form method="post">
            <div class="mb-3">
                <label for="x1" class="form-label">Informe o valor escolhido: (>= 1)</label>
                <input type="number" id="x1" name="x1" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $x1 = $_POST['x1'];
            $y = 0;
            $i = 1;
            
            while ($i <= $x1) {                
                echo "Posição $i <b>---></b> $i + $y =";
                $y = $y + $i;
                echo "$y <br>";
                $i++;                
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>