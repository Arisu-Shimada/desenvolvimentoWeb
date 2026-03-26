<?php

$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");

$sql = "SELECT * FROM funcionarios";
$dados = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>
</head>

<body>

    <h1>Cadastro de Funcionários</h1>

    <form action="funcionariosInsere.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nome"><br><br>
        <label for="">Cargo</label>
        <input type="text" name="cargo"><br><br>
        <label for="">Salário</label>
        <input type="text" name="salario"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Funcionários</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
        </tr>

        <?php foreach ($dados as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["cargo"] ?></td>
                <td><?= $linha["salario"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>