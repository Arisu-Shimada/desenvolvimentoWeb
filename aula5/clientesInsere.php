<?php

$nome = @$_POST["nome"];
$telefone = @$_POST["telefone"];
$cidade = @$_POST["cidade"];

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

if(isset($nome)){
    
    $sql = "INSERT INTO clientes (nome, telefone, cidade)
            VALUES (:nome, :telefone, :cidade)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nome,
        ":telefone" => $telefone,
        ":cidade" => $cidade
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

    <a href="clientesFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>