<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nota = @$_POST['nota'];
    ?>
    <h1><?php if($nota >= 6){echo "Aprovado: ", $nota;}else{echo "Reprovado: ", $nota;} ?></h1>
</body>
</html>