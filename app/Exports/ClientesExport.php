<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientesExport implements FromCollection, WithHeadings
{
    protected $clientes;

    public function __construct($clientes)
    {
        $this->clientes = $clientes;
    }

    /**
     * Retorna a coleção de clientes para exportação.
     */
    public function collection()
    {
        return collect($this->clientes->map(function ($cliente) {
            return [
                'ID' => $cliente->id,
                'Nome' => $cliente->nome,
                'CPF' => $cliente->cpf,
                'RG' => $cliente->rg,
                'Data de Nascimento' => $cliente->data_nascimento,
                'Cidade' => $cliente->cidade,
                'UF' => $cliente->uf,
                'Celular' => $cliente->celular,
                'Telefone' => $cliente->telefone,
                'E-mail' => $cliente->email,
                'Sexo' => $cliente->sexo,
                // Adicione outros campos aqui, se necessário.
            ];
        }));
    }

    /**
     * Define os cabeçalhos para a exportação.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'CPF',
            'RG',
            'Data de Nascimento',
            'Cidade',
            'UF',
            'Celular',
            'Telefone',
            'E-mail',
            'Sexo',
            // Adicione outros cabeçalhos aqui, se necessário.
        ];
    }
}
