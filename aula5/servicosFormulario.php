<?php

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

$sql = "SELECT * FROM servicos";
$dados = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Serviços</title>
</head>

<body>

    <h1>Cadastro de Serviços</h1>

    <form action="servicosInsere.php" method="post">
        <label for="">Descrição do serviço</label>
        <input type="text" name="descricao"><br><br>
        <label for="">Valor</label>
        <input type="text" name="valor"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Serviços</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor</th>            
        </tr>

        <?php foreach ($dados as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["descricao"] ?></td>
                <td><?= $linha["valor"] ?></td>                
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>