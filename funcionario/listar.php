
<!DOCTYPE html>
<?php

require_once('../conexao.php'); // Inclua o arquivo de conexão com o banco de dados

$sql = "SELECT * FROM funcionario ORDER BY nome ASC"; // Consulta SQL para selecionar todos os funcionários ordenados por nome
$result = mysqli_query($conexao, $sql); // Executa a consulta SQL e armazena o resultado em $result

?>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Funcionários</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>

    <div class="container">
        <h1>Lista de Funcionários</h1>

        <a class="botao" href="adicionar.php">Adicionar Funcionário</a>

        <div class="tabela-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Salário</th>
                        <th>Data de Admissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($result && mysqli_num_rows($result) > 0) { ?>

                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                            <?php
                            $data = $row['data_admissao'];

                            $dataFormatada = (!empty($data) && $data !== '0000-00-00' && strtotime($data) !== false)
                                ? date('d/m/Y', strtotime($data))
                                : 'Data inválida';
                            ?>

                            <tr>
                                <td><?= htmlspecialchars($row['nome']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['cargo']) ?></td>
                                <td>R$ <?= number_format($row['salario'], 2, ',', '.') ?></td>
                                <td><?= $dataFormatada ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>

                                    <form action="excluir.php" method="POST" onsubmit="return confirm('Deseja realmente excluir este funcionário?');">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>

                        <?php } ?>

                    <?php } else { ?>

                        <tr>
                            <td colspan="6">Nenhum funcionário encontrado.</td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

<?php
mysqli_close($conexao); // Fecha a conexão com o banco de dados
?>
