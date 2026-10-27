<?php
    //este arquivo CONECTA com o BD MySQL
    //definir as variáveis
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bd_estoque";
    //charmar o comando para CONECTAR
    $resultado = mysqli_connect($servidor, $usuario, $senha, $bd);
    if ($result) {
        echo "Conexão realizada com sucesso!";
    } else {
        echo mysqli_error($result);
    }   
?>