<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Plano;
use Illuminate\Http\Request;
use App\Rules\ValidarCpf;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index()
    {
        // Opcional: exibir uma lista de clientes
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        // Busca os planos cadastrados
        $planos = Plano::all();

        // Retorna a view com os planos
        return view('clientes.create', compact('planos'));
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'prontuario' => 'required|unique:clientes,prontuario',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date_format:d/m/Y',
            'cpf' => ['required', 'string', 'max:20', 'unique:clientes'],
            'rg' => 'required|string|max:20',
            'sexo' => 'required|in:feminino,masculino,outros',
            'cep' => 'required|regex:/^\d{5}-\d{3}$/',
            'endereco' => 'required|string|max:255',
            'numero_casa' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
            'celular' => 'required|regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            'telefone' => 'nullable|regex:/^\(\d{2}\) \d{4}-\d{4}$/',
            'email' => 'required|email|max:255',
            'responsavel' => 'nullable|string|max:255',
            'cpf_responsavel' => ['nullable', new ValidarCpf],
            'nome_plano' => 'nullable|string|max:255',
            'data_nascimento_responsavel' => 'nullable|date_format:d/m/Y',
            'titular_plano' => 'nullable|string|max:255',
            'cpf_titular_plano' => ['nullable', new ValidarCpf],
            'carteirinha_plano' => 'nullable|string|max:255',
            'observacao' => 'nullable|string|max:500',
        ]);

        try {
            // Conversão de datas para o formato Y-m-d
            $validatedData = $request->all();
            $validatedData['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');

            if (!empty($request->data_nascimento_responsavel)) {
                $validatedData['data_nascimento_responsavel'] = Carbon::createFromFormat('d/m/Y', $request->data_nascimento_responsavel)->format('Y-m-d');
            }

            // Salvar o cliente no banco de dados
            Cliente::create($validatedData);

            // Redireciona de volta para o formulário com a mensagem de sucesso
            return redirect()->route('clientes.create')->with('success', 'Cliente cadastrado com sucesso!');
        } catch (QueryException $e) {
            // Caso haja algum erro, exibe uma mensagem de erro genérica
            dd($e); //TODO: remover quando acabar de debugar
            //return redirect()->route('clientes.create')->with('error', 'Erro ao cadastrar cliente!');            
        }
    }
}
