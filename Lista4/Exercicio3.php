<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atividade 4</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Atividade 4 - A 2° palavra está contida na 1°?</h1>
<form method="post">
<div class="mb-3">
              <label for="palavraUm" class="form-label">Informe a primeira palavra:</label>
              <input type="text" id="palavraUm" name="palavraUm" class="form-control" required="">
            </div><div class="mb-3">
              <label for="palavraDois" class="form-label">Informe a segunda palavra:</label>
              <input type="text" id="palavraDois" name="palavraDois" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $palavraUm = $_POST['palavraUm'];
    $palavraDois = $_POST['palavraDois'];

    if (str_contains($palavraUm, $palavraDois)) {
        echo "A 2° palavra está contida dentro da 1°";
    }
    else {
        echo "A 2° palavra não está contida na primeira";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>