<?php

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

$sql = "SELECT * FROM fornecedores";
$dados = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Fornecedores</title>
</head>

<body>

    <h1>Cadastro de Fornecedores</h1>

    <form action="fornecedoresInsere.php" method="post">
        <label for="">Nome do Fornecedor</label>
        <input type="text" name="nome"><br><br>
        <label for="">Telefone</label>
        <input type="text" name="telefone"><br><br>
        <label for="">Produto Fornecido</label>
        <input type="text" name="produto"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Fornecedores</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Produto</th>
        </tr>

        <?php foreach ($dados as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["telefone"] ?></td>
                <td><?= $linha["produto"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>