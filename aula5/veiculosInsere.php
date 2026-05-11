<?php

$modelo = @$_POST["modelo"];
$marca = @$_POST["marca"];
$ano = @$_POST["ano"];

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

if(isset($modelo)){
    
    $sql = "INSERT INTO veiculos (modelo, marca, ano)
            VALUES (:modelo, :marca, :ano)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":modelo" => $modelo,
        ":marca" => $marca,
        ":ano" => $ano
    ]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salvo</title>
</head>
<body>

    <h1>Valores cadastrado com sucesso!</h1>

    <a href="veiculosFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>