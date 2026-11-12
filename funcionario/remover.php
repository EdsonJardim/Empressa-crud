<?php

require_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = (int) $_POST['id'];

    $sql = "DELETE FROM funcionario WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: listar.php");
            exit;
        } else {
            echo "Erro ao remover funcionário.";
        }

        mysqli_stmt_close($stmt);

    } else {
        echo "Erro ao preparar a remoção.";
    }

} else {

    header("Location: listar.php");
    exit;

}

mysqli_close($conexao);

?>