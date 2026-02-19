<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = @$_POST['a'];
        $b = @$_POST['b'];
    ?>
    <h1>Comparacao <?php if($a > $b){echo "O número ",$a," é maior que ",$b;}elseif($b > $a){echo "O número ",$b," é maior que ",$a;}else{echo "O número ",$a," é igual a ",$b;} ?></h1>
</body>
</html>