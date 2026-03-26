<?php

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

$sql = "SELECT * FROM veiculos";
$dados = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Veículos</title>
</head>

<body>

    <h1>Cadastro de Veículos</h1>

    <form action="veiculosInsere.php" method="post">
        <label for="">Modelo do veículo</label>
        <input type="text" name="modelo"><br><br>
        <label for="">Marca</label>
        <input type="text" name="marca"><br><br>
        <label for="">Ano</label>
        <input type="text" name="ano"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Veículos</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Ano</th>
        </tr>

        <?php foreach ($dados as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["modelo"] ?></td>
                <td><?= $linha["marca"] ?></td>
                <td><?= $linha["ano"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>