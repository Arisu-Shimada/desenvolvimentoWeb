<?php

$nomeC = @$_POST["nomeCurso"];
$cargaHor = @$_POST["cargaHor"];

$conexao = new PDO("mysql:host=localhost;dbname=slide4", "root", "");

if(isset($nomeC)){
    
    $sql = "INSERT INTO cursos (nome, carga_horaria)
            VALUES (:nome, :carga_horaria)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nomeC,
        ":carga_horaria" => $cargaHor
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

    <a href="formularioC.php">
        <button>Voltar</button>
    </a>

</body>
</html>