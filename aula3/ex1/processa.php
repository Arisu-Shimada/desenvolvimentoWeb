<?php
    $num = $_POST['num'];

    if(isset($num)){
        if(!empty($num)){
            if(is_numeric($num)){
                var_dump((int)$num);
                $r = $num >= 10 ? "numero igual ou maior que 10" : "numero menor que 10";
                echo $r;
            }else{ echo "nao é numerico";}
        }else{ echo "está vazio";}
    }else{echo "nao existe";}
?>