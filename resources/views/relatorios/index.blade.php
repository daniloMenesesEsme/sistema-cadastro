@extends('layout')

@section('title', 'Planos Dentários')

@section('content')
<div class="container mt-5">
    <h1>Relatórios</h1>
    <ul>
        <li>
            <a href="{{ route('relatorios.clientes') }}">Relatórios</a>
        </li>
    </ul>
</div>
@endsection
