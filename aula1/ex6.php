<?php
    $idade = 20;
    $autorizado = true;

    if($idade >= 18 && $autorizado == true){
        echo "Acesso permitido";
    } else {
        echo "Acesso negado";
    }
?>