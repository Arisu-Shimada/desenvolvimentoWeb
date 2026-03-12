<?php

$nomeP = @$_POST["nomeProfessor"];
$emailP = @$_POST["emailProfessor"];

$conexao = new PDO("mysql:host=localhost;dbname=slide4", "root", "");

if(isset($nomeP)){
    
    $sql = "INSERT INTO professores (nome, email)
            VALUES (:nome, :email)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nomeP,
        ":email" => $emailP
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

    <a href="formularioP.php">
        <button>Voltar</button>
    </a>

</body>
</html>