<?php
    $idade = $_POST['idade'];

    if(isset($idade)){
            if(is_numeric($idade)){
                $status = $idade >= 18 ? "Adulto" : "Menor";
            }else{ echo "nao é numerico";}
    }else{echo "nao existe";}
?>
<h1>Status: <?= $status; ?> </h1>