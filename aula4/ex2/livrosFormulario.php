<?php

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

$sqlL = "SELECT * FROM livros";
$dadosL = $conexao->query($sqlL);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livros</title>
</head>

<body>

    <h1>Cadastro de Livros</h1>

    <form action="livrosInsere.php" method="post">
        <label for="">Título do livro</label>
        <input type="text" name="tituloLivro"><br><br>
        <label for="">Autor</label>
        <input type="text" name="autorLivro"><br><br>
        <label for="">Preço</label>
        <input type="text" name="precoLivro"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Livros</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título do Livro</th>
            <th>Autor</th>
            <th>Preço</th>
        </tr>

        <?php foreach ($dadosL as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["titulo"] ?></td>
                <td><?= $linha["autor"] ?></td>
                <td><?= $linha["preco"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>