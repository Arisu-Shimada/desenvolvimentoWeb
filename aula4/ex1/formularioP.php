<?php

$conexao = new PDO("mysql:host=localhost;dbname=slide4", "root", "");

$sqlP = "SELECT * FROM professores";
$dadosP = $conexao->query($sqlP);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Professores</title>
</head>

<body>
    
    <h1>Cadastro de Professores</h1>

    <form action="insereP.php" method="post">
        <label for="">Nome</label>
        <input type="text" name="nomeProfessor"><br><br>
        <label for="">Email</label>
        <input type="text" name="emailProfessor"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <hr>

    <h2>Lista de Professores</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>

        <?php foreach ($dadosP as $linha): ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["nome"] ?></td>
                <td><?= $linha["email"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>