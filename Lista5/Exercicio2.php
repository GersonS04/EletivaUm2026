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
        <h1>Exercício 2 - Alunos e Médias</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome1" class="form-label">Informe o nome do primeiro aluno:</label>
                <input type="text" id="nome1" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nota1_1" class="form-label">Informe a nota da P1:</label>
                <input type="number" id="nota1_1" name="nota1[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota1_2" class="form-label">Informe a nota da P2:</label>
                <input type="number" id="nota1_2" name="nota1[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota1_3" class="form-label">Informe a nota da P3:</label>
                <input type="number" id="nota1_3" name="nota1[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>

            <div class="mb-3">
                <label for="nome2" class="form-label">Informe o nome do segundo aluno:</label>
                <input type="text" id="nome2" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nota2_1" class="form-label">Informe a nota da P1:</label>
                <input type="number" id="nota2_1" name="nota2[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota2_2" class="form-label">Informe a nota da P2:</label>
                <input type="number" id="nota2_2" name="nota2[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota2_3" class="form-label">Informe a nota da P3:</label>
                <input type="number" id="nota2_3" name="nota2[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>

            <div class="mb-3">
                <label for="nome3" class="form-label">Informe o nome do terceiro aluno:</label>
                <input type="text" id="nome3" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nota3_1" class="form-label">Informe a nota da P1:</label>
                <input type="number" id="nota3_1" name="nota3[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota3_2" class="form-label">Informe a nota da P2:</label>
                <input type="number" id="nota3_2" name="nota3[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota3_3" class="form-label">Informe a nota da P3:</label>
                <input type="number" id="nota3_3" name="nota3[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>

            <div class="mb-3">
                <label for="nome4" class="form-label">Informe o nome do quarto aluno:</label>
                <input type="text" id="nome4" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nota4_1" class="form-label">Informe a nota da P1:</label>
                <input type="number" id="nota4_1" name="nota4[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota4_2" class="form-label">Informe a nota da P2:</label>
                <input type="number" id="nota4_2" name="nota4[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota4_3" class="form-label">Informe a nota da P3:</label>
                <input type="number" id="nota4_3" name="nota4[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>

            <div class="mb-3">
                <label for="nome5" class="form-label">Informe o nome do quinto aluno:</label>
                <input type="text" id="nome5" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nota5_1" class="form-label">Informe a nota da P1:</label>
                <input type="number" id="nota5_1" name="nota5[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota5_2" class="form-label">Informe a nota da P2:</label>
                <input type="number" id="nota5_2" name="nota5[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <div class="mb-3">
                <label for="nota5_3" class="form-label">Informe a nota da P3:</label>
                <input type="number" id="nota5_3" name="nota5[]" class="form-control" step="0.1" min="0" max="10" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nome = $_POST['nome'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $nota4 = $_POST['nota4'];
            $nota5 = $_POST['nota5'];

            $notas = [$nota1, $nota2, $nota3, $nota4, $nota5];
            $mapa_alunos = [];

            for ($i = 0; $i <= 4; $i ++)
            {
                $media = array_sum($notas[$i]) / 3;
                $mapa_alunos[$nome[$i]] = $media;
            }
            arsort($mapa_alunos);

            foreach ($mapa_alunos as $nome => $media)
            {
                echo "Aluno: $nome Média: $media <br>";
            }
        }
        ?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>