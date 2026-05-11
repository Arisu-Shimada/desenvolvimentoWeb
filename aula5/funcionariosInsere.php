<?php

$nome = @$_POST["nome"];
$cargo = @$_POST["cargo"];
$salario = @$_POST["salario"];

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

if(isset($nome)){
    
    $sql = "INSERT INTO funcionarios (nome, cargo, salario)
            VALUES (:nome, :cargo, :salario)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nome,
        ":cargo" => $cargo,
        ":salario" => $salario
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

    <a href="funcionariosFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>