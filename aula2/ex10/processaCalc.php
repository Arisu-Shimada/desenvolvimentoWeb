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
    ?>
    <h1>Idade: <?php if($idade < 12){echo "criança";}elseif($idade > 12 && $idade < 17){echo "Adolescente";}elseif($idade > 18){echo "Adulto";} ?></h1>
</body>
</html>