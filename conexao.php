<?php
    //este arquivo CONECTA com o BD MySQL
    //definir as variáveis
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "empresa";
    //charmar o comando para CONECTAR
    $conexao = mysqli_connect($servidor, $usuario, $senha, $bd);
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    else {
        echo mysqli_error($conexao);
    }

?>
