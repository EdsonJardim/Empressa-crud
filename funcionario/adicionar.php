<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Funcionário</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h1>Adicionar Funcionário</h1>

    <form action="inserir.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="salario">Salário:</label>
        <input type="number" id="salario" name="salario" step="0.01" required><br><br>

        <label for="data">Data de Admissão:</label>
        <input type="date" id="data" name="data_admissao" required><br><br>

        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
