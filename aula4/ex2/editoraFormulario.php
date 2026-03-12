<?php

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

$sqlE = "SELECT * FROM editoras";
$dadosE = $conexao->query($sqlE);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Editoras</title>
</head>

<body>
    
    <h1>Cadastro de Editoras</h1>

    <form action="editoraInsere.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nomeEditora"><br><br>
        <label for="">Cidade</label>
        <input type="text" name="cidadeEditora"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Editoras</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
        </tr>

        <?php foreach ($dadosE as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["cidade"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>