<?php

$nomeE = @$_POST["nomeEditora"];
$cidade = @$_POST["cidadeEditora"];

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

if(isset($nomeE)){
    
    $sql = "INSERT INTO editoras (nome, cidade)
            VALUES (:nome, :cidade)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nomeE,
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

    <a href="editoraFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>