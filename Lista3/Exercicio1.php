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
    <h1>Atividade 3</h1>
    <form method="post">
      <div class="mb-3">
        <label for="x1" class="form-label">Informe o primeiro valor:</label>
        <input type="number" id="x1" name="x1" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x2" class="form-label">Informe o segundo valor:</label>
        <input type="number" id="x2" name="x2" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x3" class="form-label">Informe o terceiro valor:</label>
        <input type="number" id="x3" name="x3" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x4" class="form-label">Informe o quarto valor:</label>
        <input type="number" id="x4" name="x4" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x5" class="form-label">Informe o quinto valor:</label>
        <input type="number" id="x5" name="x5" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x6" class="form-label">Informe o sexto valor:</label>
        <input type="number" id="x6" name="x6" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="x7" class="form-label">Informe o sétimo valor:</label>
        <input type="number" id="x7" name="x7" class="form-control" required="">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $x1 = $_POST['x1'];
      $x2 = $_POST['x2'];
      $x3 = $_POST['x3'];
      $x4 = $_POST['x4'];
      $x5 = $_POST['x5'];
      $x6 = $_POST['x6'];
      $x7 = $_POST['x7'];

      $menor = $x1;
      $posicao = 1;

      if ($menor < $x2) {
        $menor = $x2;
        $posicao = 2;
      }
      if ($menor < $x3) {
        $menor = $x3;
        $posicao = 3;
      }
      if ($menor < $x4) {
        $menor = $x4;
        $posicao = 4;
      }
      if ($menor < $x5) {
        $menor = $x5;
        $posicao = 5;
      }
      if ($menor < $x6) {
        $menor = $x6;
        $posicao = 6;
      }
      if ($menor < $x7) {
        $menor = $x7;
        $posicao = 7;
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>