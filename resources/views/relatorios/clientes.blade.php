@extends('layouts.app')

@section('title', 'Relatório de Clientes')

@section('content')
    <h1 class="text-center my-5">Relatório de Clientes</h1>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <!--<th>ID</th>-->
                <th>Nº Prontuário</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Sexo</th>
                <th>E-mail</th>
                <th>CEP</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Celular</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Responsável</th>
                <th>CPF Responsável</th>
                <th>Nome Plano</th>
                <th>Data Nascimento Resp</th>
                <th>Titular Plano</th>
                <th>CPF Titular Plano</th>
                <th>Carteirinha Plano</th>
                <th>Observação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <!--<td>{{ $cliente->id }}</td>-->
                    <td>{{ $cliente->prontuario }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->rg }}</td>
                    <td>{{ $cliente->sexo }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->cep }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->numero_casa }}</td>
                    <td>{{ $cliente->bairro }}</td>
                    <td>{{ $cliente->cidade }}</td>
                    <td>{{ $cliente->uf }}</td>
                    <td>{{ $cliente->celular }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->responsavel }}</td>
                    <td>{{ $cliente->cpf_responsavel }}</td>
                    <td>{{ $cliente->nome_plano }}</td>
                    <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento_responsavel)->format('d/m/Y') }}</td>
                    <td>{{ $cliente->titular_plano }}</td>
                    <td>{{ $cliente->cpf_titular_plano }}</td>
                    <td>{{ $cliente->carteirinha_plano }}</td>
                    <td>{{ $cliente->observacao }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-center">
        <a href="{{ route('relatorios.exportar', 'csv') }}" class="btn btn-success btn-lg">Exportar CSV</a>
        <a href="{{ route('relatorios.exportar', 'xlsx') }}" class="btn btn-primary btn-lg">Exportar XLSX</a>
    </div>

    <!-- Adicionando o estilo customizado para a tabela -->
    @push('styles')
        <style>
            /* Estilo para o cabeçalho da tabela */
            table th {
                background-color: #007bff; /* Cor de fundo azul */
                color: white; /* Texto branco */
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
                min-width: 150px; /* Largura mínima para todas as colunas */
                word-wrap: break-word; /* Quebra as palavras que não cabem na largura da célula */
            }

            /* Melhorar a aparência geral da tabela */
            table {
                width: 100%; /* A tabela ocupa toda a largura disponível */
                border-collapse: collapse; /* Remover espaçamento entre as células */
                margin-top: 20px; /* Adicionar espaço acima da tabela */
                border: 1px solid #ddd; /* Borda leve nas células */
            }

            /* Borda para as células */
            table, th, td {
                border: 1px solid #ddd;
            }

            /* Destacar as linhas alternadas */
            table tr:nth-child(even) {
                background-color: #f9f9f9; /* Cor para as linhas alternadas */
            }
        </style>
    @endpush
@endsection
