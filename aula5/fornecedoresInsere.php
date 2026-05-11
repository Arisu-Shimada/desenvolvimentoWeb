<?php

$nome = @$_POST["nome"];
$telefone = @$_POST["telefone"];
$produto = @$_POST["produto"];

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

if(isset($nome)){
    
    $sql = "INSERT INTO fornecedores (nome, telefone, produto)
            VALUES (:nome, :telefone, :produto)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nome,
        ":telefone" => $telefone,
        ":produto" => $produto
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

    <a href="fornecedoresFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>