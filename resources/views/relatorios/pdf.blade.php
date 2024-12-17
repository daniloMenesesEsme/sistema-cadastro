<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Clientes</title>
</head>
<body>
    <h1>Relatório de Clientes</h1>

    <table border="1" cellspacing="0" cellpadding="5" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Data de Nascimento</th>
                <th>Cidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->rg }}</td>
                <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                <td>{{ $cliente->cidade }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
