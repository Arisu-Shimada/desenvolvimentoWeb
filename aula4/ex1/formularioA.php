<?php

$conexao = new PDO("mysql:host=localhost;dbname=slide4", "root", "");

$sqlA = "SELECT * FROM alunos";
$dadosA = $conexao->query($sqlA);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
</head>

<body>

    <h1>Cadastro de Aluno</h1>

    <form action="insereA.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nomeAluno"><br><br>
        <label for="">Email</label>
        <input type="text" name="emailAluno"><br><br>
        <label for="">Idade</label>
        <input type="text" name="idade"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Alunos</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
        </tr>

        <?php foreach ($dadosA as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["email"] ?></td>
                <td><?= $linha["idade"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>