<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $salario = @$_POST['salario'];
        $tempoServico = @$_POST['tempoServico'];
    ?>
    <h1>Salário total: <?php if($tempoServico >= 5){$bonus = ($salario / 100) * 10; echo "Bonus: ",$bonus, " Valor final: ",$salario + $bonus;}elseif($tempoServico >= 2){$bonus = ($salario / 100) * 5; echo "Bonus: ",$bonus, " Valor final: ",$salario + $bonus;}else{echo "sem bonus", $salario;} ?></h1>
</body>
</html>