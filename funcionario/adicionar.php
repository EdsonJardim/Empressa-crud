<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Funcionário</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>

    <div class="container">
        <h1>Adicionar Funcionário</h1>

        <form action="inserir.php" method="POST">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required>
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" id="salario" name="salario" step="0.01" min="0" required>
            </div>

            <div class="form-group">
                <label for="data">Data de Admissão:</label>
                <input type="date" id="data" name="data_admissao" required>
            </div>

            <div class="botoes">
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </div>

        </form>

        <a href="listar.php">Voltar para Lista de Funcionários</a>
    </div>

</body>
</html>
