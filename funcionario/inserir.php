<?php
require_once('../conexao.php'); // Inclua o arquivo de conexão com o banco de dados

$nome = $_POST['nome'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$admissao = $_POST['data_admissao'];

$sql = "INSERT INTO funcionario (nome, email, cargo, salario, data_admissao)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "sssds", $nome, $email, $cargo, $salario, $admissao);

$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: listar.php");
    exit;
} else {
    echo "Erro ao cadastrar funcionário: " . mysqli_error($conexao); // Exibe uma mensagem de erro caso a inserção falhe
}

mysqli_stmt_close($stmt); // Fecha a consulta preparada
mysqli_close($conexao); // Fecha a conexão com o banco de dados

?>