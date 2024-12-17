<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\RelatorioController;

    // Rota inicial
    Route::get('/', function () {
        return view('welcome');
});

    // Rotas de clientes
    Route::resource('clientes', ClienteController::class);
    
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

    // Rotas de planos
    Route::resource('planos', PlanoController::class);
    Route::get('/planos/create', [PlanoController::class, 'create'])->name('planos.create');

    // Rotas de relatórios
    Route::prefix('relatorios')->name('relatorios.')->group(function () {
    Route::get('/clientes', [RelatorioController::class, 'clientes'])->name('clientes');
    Route::get('/exportar/{format}', [RelatorioController::class, 'exportarClientes'])->name('exportar');
});
