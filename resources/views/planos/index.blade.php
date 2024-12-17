@extends('layouts.app') <!-- Extende o layout base -->

@section('title', 'Planos Dentários') <!-- Título da página -->

@section('content')
    <h1>Planos Dentários</h1>
    <a href="{{ route('planos.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Plano</a>
    <table class="table">
        <thead>
            <tr>
                <!--<th>ID</th>-->
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planos as $plano)
                <tr>
                    <!--<td>{{ $plano->id }}</td>-->
                    <td>{{ $plano->nome }}</td>
                    <td>
                        <form action="{{ route('planos.destroy', $plano->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este plano?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
