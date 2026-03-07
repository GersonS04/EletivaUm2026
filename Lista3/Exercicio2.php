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
    <h1>Exercício 2 - Soma de Valores ou Triplo da Soma (x1==x2)</h1>
    <form method="post">
      <div class="mb-3">
        <label for="x1" class="form-label">Informe o primeiro valor:</label>
        <input type="number" id="x1" name="x1" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x2" class="form-label">Informe o segundo valor:</label>
        <input type="number" id="x2" name="x2" class="form-control" required="">
      </div>
      
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $x1 = $_POST['x1'];
      $x2 = $_POST['x2'];

      if ($x1 != $x2) {
        $resultado = $x1 + $x2;
        echo "Valores diferentes! Resultado: $x1 + $x2 = $resultado";
      }
      else {
        $resultado = ($x1 + $x2) * 3;
        echo "Valores Iguais! Resultado: ($x1 + $x2) * 3 = $resultado";
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>