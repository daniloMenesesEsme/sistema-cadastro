<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('prontuario')->unique(); // Número do prontuário
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('cpf')->unique();
            $table->string('rg');
            $table->enum('sexo', ['feminino', 'masculino', 'outros']);
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero_casa');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('celular');
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->string('nome_plano')->nullable();
            $table->date('data_nascimento_responsavel')->nullable();
            $table->string('titular_plano')->nullable();
            $table->string('cpf_titular_plano')->nullable();
            $table->string('carteirinha_plano')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps(); // Criará os campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
