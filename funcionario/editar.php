
<!DOCTYPE html>
<?php
require_once('../conexao.php');

$id = (int) $_GET['id'];

$sql = "SELECT * FROM funcionario WHERE id = $id";
$result = mysqli_query($conexao, $sql); // Executa a consulta SQL e armazena o resultado em $result

if (!$result || mysqli_num_rows($result) == 0) {
    die("Funcionário não encontrado."); // Verifica se o resultado da consulta é válido e se há registros encontrados
}

$funcionario = mysqli_fetch_assoc($result); // Obtém os dados do funcionário como um array associativo
?>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>

    <div class="container">
        <h1>Editar Funcionário</h1>

        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?= $funcionario['id'] ?>">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($funcionario['nome']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($funcionario['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" value="<?= htmlspecialchars($funcionario['cargo']) ?>" required>
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" id="salario" name="salario" step="0.01" min="0" value="<?= htmlspecialchars($funcionario['salario']) ?>" required>
            </div>

            <div class="form-group">
                <label for="data">Data de Admissão:</label>
                <input type="date" id="data" name="data_admissao" value="<?= htmlspecialchars($funcionario['data_admissao']) ?>" required>
            </div>

            <div class="botoes">
                <input type="submit" value="Atualizar">
                <input type="reset" value="Limpar">
            </div>

        </form>

        <a href="listar.php">Voltar para Lista de Funcionários</a>
    </div>

</body>
</html>
<?php
mysqli_close($conexao); // Fecha a conexão com o banco de dados
?>
