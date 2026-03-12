<?php

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

$sqlC = "SELECT * FROM clientes";
$dadosC = $conexao->query($sqlC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
</head>

<body>

    <h1>Cadastro de Clientes</h1>

    <form action="clienteInsere.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nomeCliente"><br><br>
        <label for="">Email</label>
        <input type="text" name="emailCliente"><br><br>
        <label for="">Telefone</label>
        <input type="text" name="telefoneCliente"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Clientes</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>

        <?php foreach ($dadosC as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["email"] ?></td>
                <td><?= $linha["telefone"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>