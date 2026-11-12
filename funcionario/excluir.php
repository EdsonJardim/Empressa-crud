<?php

require_once('../conexao.php'); // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = (int) $_POST['id'];

    $sql = "DELETE FROM funcionario WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao excluir funcionário.";
    }

    mysqli_stmt_close($stmt);

} else {
    header("Location: listar.php");
    exit;
}

mysqli_close($conexao); // Fecha a conexão com o banco de dados

?>