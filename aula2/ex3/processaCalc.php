<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num = @$_POST['num'];
    ?>
    <h1>Número <?php if($num % 2 == 0){echo "Par: ", $num;}else{echo "Ímpar: ", $num;} ?></h1>
</body>
</html>