<?php
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];

    if(isset($nome) && isset($cidade)){
        if(!empty($nome) && !empty($cidade)){
            ?> <h1> <?= $nome, $cidade;?> </h1> <?php
        }else{ echo "Preencha todos os campos!";}
    }else{echo "nao existe";}
?>