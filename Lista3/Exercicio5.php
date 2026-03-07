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
        <h1>Exercício 5 - Qual o mês atraves do valor? (ex: 1-JAN)</h1>
        <form method="post">
            <div class="mb-3">
                <label for="x1" class="form-label">Informe o valor do mês desejado:</label>
                <input type="number" id="x1" name="x1" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $x1 = $_POST['x1'];

            switch ($x1) {
                case 1:
                    echo "O mês escolhido foi: $x1 - Janeiro";
                    break;
                case 2:
                    echo "O mês escolhido foi: $x1 - Fevereiro";
                    break;
                case 3:
                    echo "O mês escolhido foi: $x1 - Março";
                    break;
                case 4: 
                    echo "O mês escolhido foi: $x1 - Abril";
                    break;
                case 5:
                    echo "O mês escolhido foi: $x1 - Maio";
                    break;
                case 6:
                    echo "O mês escolhido foi: $x1 - Junho";
                    break;
                case 7:
                    echo "O mês escolhido foi: $x1 - Julho";
                    break;
                case 8:
                    echo "O mês escolhido foi: $x1 - Agosto";
                    break;
                case 9:
                    echo "O mês escolhido foi: $x1 - Setembro";
                    break;
                case 10:
                    echo "O mês escolhido foi: $x1 - Outubro";
                    break;
                case 11:
                    echo "O mês escolhido foi: $x1 - Novembro";
                    break;
                case 12:
                    echo "O mês escolhido foi: $x1 - Dezembro";
                    break;
                default:
                    echo "O valor inserido não corresponde a nenhum mês do calendário";
                    break;
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>