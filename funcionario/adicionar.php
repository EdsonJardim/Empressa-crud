<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adicionar Funcionário</title>

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

    <h2>Adicionar Funcionário</h2>

    <form action="inserir.php" method="POST">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>

            <input
                type="text"
                class="form-control"
                id="nome"
                name="nome"
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
                required
            >
        </div>

        <div class="botoes">

            <button type="submit" class="btn btn-success px-4">
                Cadastrar
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