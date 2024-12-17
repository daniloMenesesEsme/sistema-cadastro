<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Cadastro')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex">
        <!-- Menu Lateral -->
        <nav class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4>Sistema</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('clientes.create') }}" class="nav-link text-white">Cadastro de Cliente</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('planos.index') }}" class="nav-link text-white">Cadastro de Planos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('relatorios.clientes') }}" class="nav-link text-white">Relatórios</a>
                </li>
            </ul>
        </nav>

        <!-- Conteúdo Principal -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
