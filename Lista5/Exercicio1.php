<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 1 - Atividade 5</h1>
<form method="post">
<div class="mb-3">
              <label for="nome[]" class="form-label">Informe o primeiro nome: </label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="fone[]" class="form-label">Informe o primeiro telefone:</label>
              <input type="number" id="fone[]" name="fone[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="nome[]" class="form-label">Informe o segundo nome:</label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="fone[]" class="form-label">Informe o segundo telefone: </label>
              <input type="number" id="fone[]" name="fone[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="nome[]" class="form-label">Informe o terceiro nome: </label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="fone[]" class="form-label">Informe o terceiro telefone: </label>
              <input type="number" id="fone[]" name="fone[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="nome[]" class="form-label">Informe o quarto nome: </label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="fone[]" class="form-label">Informe o quarto telefone: </label>
              <input type="number" id="fone[]" name="fone[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="nome[]" class="form-label">Informe o quinto nome: </label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="mb-3">
              <label for="fone[]" class="form-label">Informe o quinto telefone: </label>
              <input type="number" id="fone[]" name="fone[]" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $nome = $_POST['nome'];
    $fone = $_POST['fone'];

    //for($i = 0; $i < 5; $i++)
    //{
    //    echo "$nome[$i]";
    //    echo "$fone[$i]";
    //}
    $contatos = [];

    for ($i = 0; $i < count($nome); $i++)
    {
        $contatos[$nome[$i]] = $fone[$i];        
    }
    print_r($contatos);
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>