<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Empresa - Sistema de Funcionários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            min-height: 100vh;
        }

        /* Menu superior */
        .navbar {
            background-color: #245c3b;
        }

        .navbar-brand {
            font-size: 22px;
        }

        .nav-link {
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        /* Cartão principal */
        .container-principal {
            max-width: 1180px;
            margin: 60px auto;
            padding: 55px 35px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .container-principal h1 {
            color: #245c3b;
            font-weight: bold;
        }

        .container-principal h3 {
            color: #6c757d;
            margin-top: 20px;
        }

        .container-principal p {
            margin-top: 25px;
            font-size: 17px;
            color: #343a40;
        }

        .btn-acessar {
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .container-principal {
                margin: 30px 12px;
                padding: 35px 20px;
            }

            .container-principal h1 {
                font-size: 28px;
            }

            .container-principal h3 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Menu superior -->
    <nav class="navbar navbar-expand-lg navbar-dark">

        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php">
                EMPRESA
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Abrir menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            Início
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="funcionario/listar.php">
                            Funcionários
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="funcionario/adicionar.php">
                            Adicionar Funcionário
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Conteúdo principal -->
    <main class="container">

        <div class="container-principal">

            <h1 class="display-5">
                BEM-VINDO À EMPRESA
            </h1>

            <hr>

            <h3>
                Escolha uma operação no menu superior
            </h3>

            <p>
                Sistema de gerenciamento de funcionários.
            </p>

            <a
                href="funcionario/listar.php"
                class="btn btn-success btn-lg btn-acessar">

                Acessar Funcionários

            </a>

        </div>

    </main>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>