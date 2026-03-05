<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $valorCompra = @$_POST['valorCompra'];
    ?>
    <h1>Valor total: <?php if($valorCompra >= 100){$desconto = ($valorCompra / 100) * 10; echo "Desconto: ",$desconto, " Valor final: ",$valorCompra - $desconto;}else{echo $valorCompra;} ?></h1>
</body>
</html>