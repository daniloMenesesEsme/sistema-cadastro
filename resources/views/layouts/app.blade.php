<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Cadastro')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Estilo do corpo e layout */
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }

        /* Menu lateral */
        #sidebar {
            width: 250px;
            background-color: #052d56;
            color: white;
            min-height: 100vh;
            position: fixed;
        }

        #sidebar .nav-link {
            color: white;
            padding: 10px;
            text-decoration: none;
        }

        #sidebar .nav-link:hover {
            background-color: #495057;
        }

        /* Conteúdo principal */
        main {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        /* Responsividade para telas menores */
        @media (max-width: 768px) {
            #sidebar {
                position: absolute;
                width: 100%;
                height: auto;
            }
            main {
                margin-left: 0;
            }
        }

        /* Estilo adicional para botões */
        .btn-custom {
            background-color: #052d56;
            color: white;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #495057;
        }

        
        /* Estilo para o cabeçalho da tabela */
        table th {
            background-color: #074383; /* Cor de fundo azul */
            color: rgb(249, 248, 250); /* Texto branco */
            font-weight: bold; /* Negrito */
            text-align: center; /* Centralizar o texto */
            padding: 10px; /* Espaço dentro da célula */
        }

        /* Estilo para as células da tabela */
        table td {
            padding: 10px; /* Espaço dentro das células */
            text-align: center; /* Alinhar texto ao centro */
        }

        /* Ajustando a largura das colunas */
        table th, table td {
            min-width: 250px; /* Largura mínima para todas as colunas */
            word-wrap: break-word; /* Quebra as palavras que não cabem na largura da célula */
        }

        /* Melhorar a aparência geral da tabela */
        table {
            width: 100%; /* A tabela ocupa toda a largura disponível */
            border-collapse: collapse; /* Remover espaçamento entre as células */
            margin-top: 20px; /* Adicionar espaço acima da tabela */
            border: 1px solid #fcfafa; /* Borda leve nas células */
        }

        /* Borda para as células */
        table, th, td {
            border: 1px solid #ddd;
        }

        /* Destacar as linhas alternadas */
        table tr:nth-child(even) {
            background-color: #f9f9f9; /* Cor para as linhas alternadas */
        }

        label {
        font-weight: bold;
    }

    </style>
</head>
<body>
    <!-- Menu Lateral -->
    <nav id="sidebar">
        <div class="p-3">
            <h4>Sistema</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.create') }}">Cadastro de Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('planos.index') }}">Cadastro de Planos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorios.clientes') }}">Relatórios</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
