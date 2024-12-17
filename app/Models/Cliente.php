<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'prontuario',
        'nome',
        'data_nascimento',
        'cpf',
        'rg',
        'sexo',
        'cep',
        'endereco',
        'numero_casa',
        'bairro',
        'cidade',
        'uf',
        'celular',
        'telefone',
        'email',
        'responsavel',
        'cpf_responsavel',
        'nome_plano',
        'data_nascimento_responsavel',
        'titular_plano',
        'cpf_titular_plano',
        'carteirinha_plano',
        'observacao',
    ];
    
}
