<?php

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

$sql = "SELECT * FROM clientes";
$dados = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
</head>

<body>

    <h1>Cadastro de Clientes</h1>

    <form action="clientesInsere.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nome"><br><br>
        <label for="">Telefone</label>
        <input type="text" name="telefone"><br><br>
        <label for="">Cidade</label>
        <input type="text" name="cidade"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Clientes</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Cidade</th>
        </tr>

        <?php foreach ($dados as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["telefone"] ?></td>
                <td><?= $linha["cidade"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>