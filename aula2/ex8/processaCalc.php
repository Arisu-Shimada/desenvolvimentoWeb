<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $usuario = @$_POST['usuario'];
        $senha = @$_POST['senha'];
    ?>
    <h1>Login: <?php if($usuario == "admin" && $senha == "123"){echo "Login válido";}else{echo "Login inválido";} ?></h1>
</body>
</html>