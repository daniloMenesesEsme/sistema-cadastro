<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::all(); // Recupera todos os planos
        return view('planos.index', compact('planos'));
    }

    public function create()
    {
        return view('planos.create'); // Retorna a view de criação
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:planos,nome|max:255',
        ]);

        Plano::create($request->all()); // Salva o plano no banco

        return redirect()->route('planos.index')->with('success', 'Plano cadastrado com sucesso!');
    }

    public function destroy(Plano $plano)
    {
        $plano->delete(); // Remove o plano do banco
        return redirect()->route('planos.index')->with('success', 'Plano removido com sucesso!');
    }
}
