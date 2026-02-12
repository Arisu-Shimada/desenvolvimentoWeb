<?php
    $valorCompra = 0;

    if ($valorCompra >= 100){
        $desconto = ($valorCompra / 100) * 10;
        echo "Desconto aplicado: ",$valorCompra - $desconto;
    } else {
        echo "Sem desconto: ",$valorCompra;
    }
?>