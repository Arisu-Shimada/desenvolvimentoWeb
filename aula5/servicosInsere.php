<?php

$descricao = @$_POST["descricao"];
$valor = @$_POST["valor"];

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

if(isset($descricao)){
    
    $sql = "INSERT INTO servicos (descricao, valor)
            VALUES (:descricao, :valor)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":descricao" => $descricao,
        ":valor" => $valor
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

    <a href="servicosFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>