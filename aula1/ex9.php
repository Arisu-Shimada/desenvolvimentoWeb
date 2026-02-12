<?php
    $salario = 2500;
    $tempoServico = 6;

    if($tempoServico >= 5){
        $bonus = ($salario / 100) * 10;
        echo "bonus de salario: ", $bonus;
        echo " salario total: ", $salario + $bonus;
    } elseif($tempoServico >= 2){
        $bonus = ($salario / 100) * 5;
        echo "bonus de salario: ", $bonus;
        echo " salario total: ", $salario + $bonus;
    } else {
        echo "sem bonus";
    }
?>