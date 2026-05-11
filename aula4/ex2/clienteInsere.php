<?php

$nomeC = @$_POST["nomeCliente"];
$email = @$_POST["emailCliente"];
$telefone = @$_POST["telefoneCliente"];

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

if(isset($nomeC)){
    
    $sql = "INSERT INTO clientes (nome, email, telefone)
            VALUES (:nome, :email, :telefone)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        ":nome" => $nomeC,
        ":email" => $email,
        ":telefone" => $telefone
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
    
    <h1>Valores cadastrado com sucesso!</h1X>

    <a href="clienteFormulario.php">
        <button>Voltar</button>
    </a>

</body>
</html>