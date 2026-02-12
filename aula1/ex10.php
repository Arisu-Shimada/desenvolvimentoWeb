<?php
    $idade = 0;

    if($idade < 12){
        echo "crianca";
    } elseif($idade > 12 && $idade < 17){
        echo "adolescente";
    } elseif($idade >= 18) {
        echo "adulto";
    }
?>