<?php
    $num1 = (int)$_POST['num1'];
    $num2 = (int)$_POST['num2'];

    if(isset($num1) && isset($num2)){
        if(!empty($num1) && !empty($num2)){
            if(is_numeric($num1) && is_numeric($num2)){
                var_dump($num1, $num2);
                echo "resultado: ", $num1 + $num2;
            }else{ echo "Digite apenas números";}
        }else{ echo "está vazio";}
    }else{echo "nao existe";}
?>