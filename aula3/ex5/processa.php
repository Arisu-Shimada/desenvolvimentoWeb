<?php
    $nome = $_POST['nome'];
    $idade = (int)$_POST['idade'];
    $salario = (int)$_POST['salario'];

    if(isset($nome) && isset($idade) && isset($salario)){
        if(!empty($nome) && !empty($idade) && !empty($salario)){
            if (is_numeric($idade) && is_numeric($salario)){
                htmlspecialchars($nome);
                $msg = $salario >= 5000 ? "Salário Alto" : "Salário Comum";
                var_dump($idade);
            }else{echo "Digite um número para idade e salário";}
        }else{ echo "Preencha todos os campos!";}
    }else{echo "nao existe";}
?>
<h1> <?= "Nome: ", $nome, " Idade: ", $idade, " Status: ", $msg; ?> </h1>