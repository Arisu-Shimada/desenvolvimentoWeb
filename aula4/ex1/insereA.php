<?php

$nomeA = @$_POST["nomeAluno"];
$emailA = @$_POST["emailAluno"];
$idade = @$_POST["idade"];

$conexao = new PDO("mysql:host=localhost;dbname=slide4", "root", "");

if(isset($nomeA)){
    
    $sql = "INSERT INTO alunos (nome, email, idade)
            VALUES (:nome, :email, :idade)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nomeA,
        ":email" => $emailA,
        ":idade" => $idade
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

    <a href="formularioA.php">
        <button>Voltar</button>
    </a>

</body>
</html>