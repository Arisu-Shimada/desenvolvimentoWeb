<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $idade = @$_POST['idade'];
        $status = @$_POST['status'];
    ?>
    <h1>Situação: <?php if($idade >= 18 && $status == "true"){echo "Acesso permitido";}else{echo "Acesso negado";} ?></h1>
</body>
</html>