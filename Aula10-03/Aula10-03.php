<?php

    date_default_timezone_set("America/Sao_Paulo");
    $data = date("d/m/Y H:i:s");
    echo "<p> $data </p>";

    $valor = 1505.88888;
    $valor_arredondado = round($valor);
    echo "<p>Valor Arredondado: $valor_arredondado </p>";
    $valor_formatado = number_format($valor, 2, ",", ".");
    echo "<p>Valor sem formatação: $valor</p>";
    echo "<p>Valor Formatado: $valor_formatado</p>";
    //Exponenciação
    $exp = pow(3,4);
    //Raiz Quadrada
    $raiz = sqrt(16);
    //Números aleatórios
    for ($i=0; $i <= 5; $i++) {
        $aleatorio = rand(1, 60);
        echo "- $aleatorio ";
    }
    if(isset($nome))
    {
        echo "<p>Nome Informado!</p>";        
    }
    else
    {
        echo "<p>Nome não inforamdo!</p>";
        die();
    }
    
    if (is_float($valor))
    {
        echo "<p>É um número flutuante</p>";
    }
?>