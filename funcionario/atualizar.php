<?php

require_once('../conexao.php'); // Inclua o arquivo de conexão com o banco de dados

$id = (int) $_POST['id'];
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);
$salario = (float) $_POST['salario'];
$data_admissao = $_POST['data_admissao'];

$sql = "UPDATE funcionario SET
        nome = '$nome',
        email = '$email',
        cargo = '$cargo',
        salario = '$salario',
        data_admissao = '$data_admissao'
        WHERE id = $id";

if (mysqli_query($conexao, $sql)) {
    header("Location: listar.php");
    exit;
} else {
    echo "Erro ao atualizar funcionário: " . mysqli_error($conexao);
}

mysqli_close($conexao); // Fecha a conexão com o banco de dados

?>