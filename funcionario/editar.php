<?php
require_once('../conexao.php');

// Verifica se o ID foi informado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID do funcionário inválido.");
}

$id = (int) $_GET['id'];

// Consulta o funcionário
$sql = "SELECT * FROM funcionario WHERE id = ?";
$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Funcionário não encontrado.");
}

$funcionario = mysqli_fetch_assoc($result);

// Trata a data de admissão
$dataAdmissao = $funcionario['data_admissao'];

if ($dataAdmissao == '0000-00-00') {
    $dataAdmissao = '';
}
?>

<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Funcionário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../main.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .container-formulario {
            max-width: 1180px;
            margin: 60px auto;
            padding: 32px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .container-formulario h2 {
            color: #343a40;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #343a40;
        }

        .form-control {
            padding: 10px;
            border-radius: 6px;
        }

        .botoes {
            margin-top: 25px;
        }

        .link-voltar {
            display: inline-block;
            margin-top: 20px;
            color: #198754;
            text-decoration: underline;
        }

        .link-voltar:hover {
            color: #146c43;
        }
    </style>
</head>

<body>

    <div class="container container-formulario">

        <h2>Editar Funcionário</h2>

        <form action="atualizar.php" method="POST">

            <input
                type="hidden"
                name="id"
                value="<?= $funcionario['id'] ?>"
            >

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>

                <input
                    type="text"
                    class="form-control"
                    id="nome"
                    name="nome"
                    value="<?= htmlspecialchars($funcionario['nome']) ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>

                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($funcionario['email']) ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>

                <input
                    type="text"
                    class="form-control"
                    id="cargo"
                    name="cargo"
                    value="<?= htmlspecialchars($funcionario['cargo']) ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salário:</label>

                <input
                    type="number"
                    class="form-control"
                    id="salario"
                    name="salario"
                    step="0.01"
                    min="0"
                    value="<?= htmlspecialchars($funcionario['salario']) ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="data_admissao" class="form-label">
                    Data de Admissão:
                </label>

                <input
                    type="date"
                    class="form-control"
                    id="data_admissao"
                    name="data_admissao"
                    value="<?= htmlspecialchars($dataAdmissao) ?>"
                    required
                >
            </div>

            <div class="botoes">

                <button type="submit" class="btn btn-success px-4">
                    Atualizar
                </button>

                <button type="reset" class="btn btn-secondary px-4 ms-2">
                    Limpar
                </button>

            </div>

        </form>

        <a href="listar.php" class="link-voltar">
            Voltar para Lista de Funcionários
        </a>

    </div>

</body>
</html>

<?php
mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>