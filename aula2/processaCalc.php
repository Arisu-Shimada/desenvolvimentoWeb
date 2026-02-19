<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero1 = $_GET["numero1"];
        $numero2 = $_GET["numero2"];
        $total = $numero1 + $numero2;
    ?>
    <h1>Resultado: <?php echo $total; ?></h1>
</body>
</html>