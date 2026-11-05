<?php

require_once('../conexao.php'); // Conexão com o banco de dados

$nome = $_POST['nome'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$admissao = $_POST['data_admissao'];
// Criar o comando SQL
$sql = "INSERT INTO funcionario (nome, email, cargo, salario, data_admissao)
        VALUES ('$nome', '$email', '$cargo', '$salario', '$admissao')";

$result = mysqli_query($conexao, $sql); // Executa o comando SQL

if ($result == true) {
    header("Location:listar.php");
    exit;
} else {
    echo "Erro ao cadastrar funcionário: " . mysqli_error($conexao);
}

?>
