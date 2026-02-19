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
    <h1>Resultado da nota: 
        <?php 
            if($nota >= 9){
                echo "Excelente";
            }elseif($nota >= 7 && $nota < 9){
                echo "Bom";
            }elseif($nota >= 6 && $nota < 7){
                echo "Regular";
            }elseif($nota < 6){
                echo "Insuficiente";
            } 
        ?>
    </h1>
</body>
</html>