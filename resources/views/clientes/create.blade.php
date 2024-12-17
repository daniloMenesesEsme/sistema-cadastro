@extends('layouts.app')

@section('title', 'Cadastro de Cliente')

@section('content')
    <h1>Cadastro de Cliente</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário -->
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Número do Prontuário -->
            <div class="mb-3 col-md-3">
                <label for="cidade" class="font-weight-bold">Número do Prontuário</label>
                <input type="text" name="prontuario" id="prontuario" class="form-control" value="{{ old('prontuario') }}" required>
            </div>

            <!-- Nome -->
            <div class="mb-3 col-md-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <!-- Data de Nascimento -->
            <div class="mb-3 col-md-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}" placeholder="dd/mm/aaaa" required>
            </div>

            <!-- CPF -->
            <div class="mb-3 col-md-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}" placeholder="000.000.000-00" required>
                @error('cpf') <!-- Exibe o erro de CPF duplicado -->
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- RG -->
            <div class="mb-3 col-md-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" name="rg" id="rg" class="form-control" value="{{ old('rg') }}" required>
            </div>

            <!-- Sexo -->
            <div class="mb-3 col-md-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="feminino" {{ old('sexo') == 'feminino' ? 'selected' : '' }}>Feminino</option>
                    <option value="outros" {{ old('sexo') == 'outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>

            <!-- CEP -->
            <div class="mb-3 col-md-3">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep') }}" placeholder="00000-000" required>
            </div>

            <!-- Endereço -->
            <div class="mb-3 col-md-3">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco') }}" placeholder="Rua/Avenida" readonly>
            </div>

            <!-- Número da Casa -->
            <div class="mb-3 col-md-3">
                <label for="numero_casa">Número</label>
                <input type="text" name="numero_casa" id="numero_casa" class="form-control" value="{{ old('numero_casa') }}" placeholder="Digite o número da casa" required>
            </div>

            <!-- Bairro -->
            <div class="mb-3 col-md-3">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control" value="{{ old('bairro') }}" readonly>
            </div>

            <!-- Cidade -->
            <div class="mb-3 col-md-3">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="{{ old('cidade') }}" readonly>
            </div>

            <!-- UF -->
            <div class="mb-3 col-md-3">
                <label for="uf">UF</label>
                <input type="text" name="uf" id="uf" class="form-control" value="{{ old('uf') }}" readonly>
            </div>

            <!-- Celular -->
            <div class="mb-3 col-md-3">
                <label for="celular">Celular</label>
                <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular') }}" placeholder="(00) 00000-0000" required>
            </div>

            <!-- Telefone -->
            <div class="mb-3 col-md-3">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone') }}" placeholder="(00) 0000-0000 ou (00) 00000-0000">
            </div>

            <!-- E-mail -->
            <div class="mb-3 col-md-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- Responsável -->
            <div class="mb-3 col-md-3">
                <label for="responsavel" class="form-label">Responsável</label>
                <input type="text" name="responsavel" id="responsavel" class="form-control" value="{{ old('responsavel') }}" required>
            </div>

            <!-- CPF do Responsável -->
            <div class="mb-3 col-md-3">
                <label for="cpf_responsavel" class="form-label">CPF do Responsável</label>
                <input type="text" name="cpf_responsavel" id="cpf_responsavel" class="form-control" value="{{ old('cpf_responsavel') }}" placeholder="000.000.000-00" required>
            </div>

            <!-- Nome do Plano -->
            <div class="mb-3 col-md-3">
                <label for="nome_plano" class="form-label">Nome do Plano</label>
                <select name="nome_plano" id="nome_plano" class="form-control" required>
                    <option value="" disabled selected>Selecione um plano</option>
                    @foreach ($planos as $plano)
                        <option value="{{ $plano->nome }}" {{ old('nome_plano') == $plano->nome ? 'selected' : '' }}>{{ $plano->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Data de Nascimento do Responsável -->
            <div class="mb-3 col-md-3">
                <label for="data_nascimento_responsavel" class="form-label">Data de Nascimento do Responsável</label>
                <input type="text" name="data_nascimento_responsavel" id="data_nascimento_responsavel" class="form-control" value="{{ old('data_nascimento_responsavel') }}" placeholder="dd/mm/aaaa" required>
            </div>

            <!-- Titular do Plano -->
            <div class="mb-3 col-md-3">
                <label for="titular_plano" class="form-label">Titular do Plano</label>
                <input type="text" name="titular_plano" id="titular_plano" class="form-control" value="{{ old('titular_plano') }}" required>
            </div>

            <!-- CPF do Titular do Plano -->
            <div class="mb-3 col-md-3">
                <label for="cpf_titular" class="form-label">CPF do Titular do Plano</label>
                <input type="text" name="cpf_titular" id="cpf_titular" class="form-control" value="{{ old('cpf_titular') }}" placeholder="000.000.000-00" required>
            </div>

            <!-- Carteirinha do Plano -->
            <div class="mb-3 col-md-3">
                <label for="carteirinha" class="form-label">Carteirinha do Plano</label>
                <input type="text" name="carteirinha" id="carteirinha" class="form-control" value="{{ old('carteirinha') }}" required>
            </div>

            <!-- Observação -->
            <div class="mb-3 col-md-12">
                <label for="observacao" class="form-label">Observação</label>
                <textarea name="observacao" id="observacao" class="form-control" rows="3">{{ old('observacao') }}</textarea>
            </div>

            <!-- Botão Salvar -->
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>

    <!-- Script para exibir o pop-up (SweetAlert) -->
    @if ($errors->has('cpf'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first('cpf') }}',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // O pop-up foi fechado, o usuário pode corrigir o CPF
                }
            });
        </script>
    @endif

    <!-- Script para Autocompletar o CEP e Máscaras -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function () {
            // Máscara para o CEP
            $('#cep').mask('00000-000');
            // Máscara fixa para celular
            $('#celular').mask('(00) 00000-0000');
            // Aplicar máscara para Data de Nascimento
            $('#data_nascimento').mask('00/00/0000');
            $('#data_nascimento_responsavel').mask('00/00/0000');
            // Máscara dinâmica para telefone (fixo e celular)
            var behavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-0000';
            };
            var options = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(behavior.apply({}, arguments), options);
                }
            };
            $('#telefone').mask(behavior, options);
            // Máscara para CPF (000.000.000-00)
            $('#cpf, #cpf_responsavel, #cpf_titular').mask('000.000.000-00', {reverse: true});
            // Busca de CEP automático
            $('#cep').on('blur', function () {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep.length == 8) {
                    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                        if (!("erro" in data)) {
                            $('#endereco').val(data.logradouro);
                            $('#bairro').val(data.bairro);
                            $('#cidade').val(data.localidade);
                            $('#uf').val(data.uf);
                        } else {
                            alert('CEP não encontrado!');
                        }
                    }).fail(function () {
                        alert('Erro ao buscar o CEP. Verifique sua conexão com a internet.');
                    });
                } else {
                    alert('CEP inválido! Digite um CEP válido com 8 dígitos.');
                }
            });
        });
    </script>

@endsection
