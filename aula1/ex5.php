<?php
    $nota = 0;

    if($nota >= 9){
        echo "Excelente!";
    } elseif($nota >= 7){
        echo "Bom!";
    } elseif($nota >= 6){
        echo "Regular, nao fez mais que sua obrigacao!";
    } elseif($nota < 6){
        echo "Insuficiente";
    }
?>