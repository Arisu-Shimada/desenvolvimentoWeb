<?php

$tituloLivro = @$_POST["tituloLivro"];
$autorLivro = @$_POST["autorLivro"];
$precoLivro = @$_POST["precoLivro"];

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

if(isset($tituloLivro)){
    
    $sql = "INSERT INTO livros (titulo, autor, preco)
            VALUES (:titulo, :autor, :preco)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":titulo" => $tituloLivro,
        ":autor" => $autorLivro,
        ":preco" => $precoLivro
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

    <h1>Valores cadastrados com sucesso!</h1>

    <a href="livrosFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>