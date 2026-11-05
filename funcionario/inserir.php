<?php
require_once('../conexao.php'); // Inclua o arquivo de conexão com o banco de dados

$nome = $_POST['nome'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$admissao = $_POST['data_admissao'];

$sql = "INSERT INTO funcionario (nome, email, cargo, salario, data_admissao)
        VALUES (?, ?, ?, ?, ?)"; // Consulta SQL para inserir os dados do funcionário

$stmt = mysqli_prepare($conexao, $sql); // Prepara a consulta SQL para inserção de dados

mysqli_stmt_bind_param($stmt, "sssds", $nome, $email, $cargo, $salario, $admissao); // Vincula os parâmetros à consulta preparada

$result = mysqli_stmt_execute($stmt); // Executa a consulta preparada e armazena o resultado em $result

if ($result) {
    header("Location: listar.php"); // Redireciona para a página de listagem de funcionários após a inserção bem-sucedida
    exit; // Encerra o script após o redirecionamento
} else {
    echo "Erro ao cadastrar funcionário: " . mysqli_error($conexao); // Exibe uma mensagem de erro caso a inserção falhe
}

mysqli_stmt_close($stmt); // Fecha a consulta preparada
mysqli_close($conexao); // Fecha a conexão com o banco de dados

?>
