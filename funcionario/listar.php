<?php
require_once('../conexao.php');

$sql = "SELECT * FROM funcionario ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../main.css">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Lista de Funcionários</h2>

    <a href="adicionar.php" class="btn btn-success mb-3">
        Adicionar Funcionário
    </a>

    <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover">

            <thead class="table-dark">
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

                <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

                    <?php while ($row = mysqli_fetch_assoc($resultado)): ?>

                        <?php
                        $dataFormatada = 'Data inválida';

                        if (
                            !empty($row['data_admissao']) &&
                            $row['data_admissao'] != '0000-00-00'
                        ) {
                            $data = DateTime::createFromFormat(
                                'Y-m-d',
                                $row['data_admissao']
                            );

                            if ($data !== false) {
                                $dataFormatada = $data->format('d/m/Y');
                            }
                        }
                        ?>

                        <tr>

                            <td><?= htmlspecialchars($row['nome']) ?></td>

                            <td><?= htmlspecialchars($row['email']) ?></td>

                            <td><?= htmlspecialchars($row['cargo']) ?></td>

                            <td>
                                R$ <?= number_format(
                                    (float) $row['salario'],
                                    2,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td><?= $dataFormatada ?></td>

                            <td>

                                <!-- Botão Editar -->
                                <a href="editar.php?id=<?= $row['id'] ?>"
                                   class="btn btn-warning btn-sm mb-1">
                                    Editar
                                </a>

                                <!-- Botão Excluir -->
                                <button type="button"
                                        class="btn btn-danger btn-sm mb-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir<?= $row['id'] ?>">
                                    Excluir
                                </button>

                                <!-- Botão Remover -->
                                <button type="button"
                                        class="btn btn-secondary btn-sm mb-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalRemover<?= $row['id'] ?>">
                                    Remover
                                </button>

                            </td>

                        </tr>

                        <!-- Modal Excluir -->
                        <div class="modal fade"
                             id="modalExcluir<?= $row['id'] ?>"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">
                                            Confirmar exclusão
                                        </h5>

                                        <button type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal">
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Deseja realmente excluir o funcionário
                                        <strong><?= htmlspecialchars($row['nome']) ?></strong>?
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Cancelar
                                        </button>

                                        <form action="excluir.php" method="POST">

                                            <input type="hidden"
                                                   name="id"
                                                   value="<?= $row['id'] ?>">

                                            <button type="submit"
                                                    class="btn btn-danger">
                                                Sim, excluir
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Modal Remover -->
                        <div class="modal fade"
                             id="modalRemover<?= $row['id'] ?>"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header bg-secondary text-white">
                                        <h5 class="modal-title">
                                            Confirmar remoção
                                        </h5>

                                        <button type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal">
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Tem certeza de que deseja remover
                                        <strong><?= htmlspecialchars($row['nome']) ?></strong>?
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Cancelar
                                        </button>

                                        <form action="remover.php" method="POST">

                                            <input type="hidden"
                                                   name="id"
                                                   value="<?= $row['id'] ?>">

                                            <button type="submit"
                                                    class="btn btn-secondary">
                                                Sim, remover
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="6" class="text-center">
                            Nenhum funcionário cadastrado.
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    <a href="../index.php" class="btn btn-secondary mt-3">
        Voltar ao início
    </a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
mysqli_close($conexao);
?>