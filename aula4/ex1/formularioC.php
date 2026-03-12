<?php

$conexao = new PDO("mysql:host=localhost;dbname=slide4", "root", "");

$sqlC = "SELECT * FROM cursos";
$dadosC = $conexao->query($sqlC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cursos</title>
</head>

<body>

    <h1>Cadastro de Cursos</h1>

    <form action="insereC.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nomeCurso"><br><br>
        <label for="">Carga Horária</label>
        <input type="text" name="cargaHor"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Cursos</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Carga Horária</th>
        </tr>

        <?php foreach ($dadosC as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["carga_horaria"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>