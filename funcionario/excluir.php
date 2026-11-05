<?php

require_once('../conexao.php'); // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = (int) $_POST['id']; // Converte o ID para um inteiro para evitar injeção de SQL

    $sql = "DELETE FROM funcionario WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql); // Prepara a consulta SQL para exclusão de dados

    mysqli_stmt_bind_param($stmt, "i", $id); // Vincula o parâmetro à consulta preparada

    if (mysqli_stmt_execute($stmt)) {
        header("Location: listar.php"); // Redireciona para a página de listagem de funcionários após a exclusão bem-sucedida
        exit;
    } else {
        echo "Erro ao excluir funcionário."; // Exibe uma mensagem de erro caso a exclusão falhe
    }

    mysqli_stmt_close($stmt); // Fecha a consulta preparada

} else {
    header("Location: listar.php"); // Redireciona para a página de listagem de funcionários se o método de requisição não for POST ou se o ID não estiver definido 
    exit;
}

mysqli_close($conexao); // Fecha a conexão com o banco de dados

?>
