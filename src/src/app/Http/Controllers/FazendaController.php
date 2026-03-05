<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Veterinario;

class FazendaController extends Controller
{
    /**
     * Listar fazendas
     */
    public function index()
    {
        $fazendas = Fazenda::with('veterinarios')->paginate(10);

        return view('fazendas.index', compact('fazendas'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        $veterinarios = Veterinario::all();

        return view('fazendas.create', compact('veterinarios'));
    }

    /**
     * Salvar nova fazenda
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:fazendas,nome',
            'tamanho' => 'required|numeric|min:1',
            'responsavel' => 'required|string|max:255',
            'veterinarios' => 'required|array|min:1',
            'veterinarios.*' => 'exists:veterinarios,crmv',
        ]);

        $fazenda = Fazenda::create([
            'nome' => $request->nome,
            'tamanho' => $request->tamanho,
            'responsavel' => $request->responsavel,
        ]);

        $fazenda->veterinarios()->sync($request->veterinarios);

        return redirect()
            ->route('fazendas.index')
            ->with('success', 'Fazenda criada com sucesso!');
    }

    /**
     * Formulário de edição
     */
    public function edit($id)
    {
        $fazenda = Fazenda::with('veterinarios')->findOrFail($id);
        $veterinarios = Veterinario::all();

        return view('fazendas.edit', compact('fazenda', 'veterinarios'));
    }

    /**
     * Atualizar fazenda
     */
    public function update(Request $request, Fazenda $fazenda)
    {
        $request->validate([
            'nome' => 'required|unique:fazendas,nome,' . $fazenda->id,
            'tamanho' => 'required|numeric|min:1',
            'responsavel' => 'required|string|max:255',
            'veterinarios' => 'required|array|min:1',
            'veterinarios.*' => 'exists:veterinarios,crmv',
        ]);

        $fazenda->update([
            'nome' => $request->nome,
            'tamanho' => $request->tamanho,
            'responsavel' => $request->responsavel,
        ]);

        $fazenda->veterinarios()->sync($request->veterinarios);

        return redirect()
            ->route('fazendas.index')
            ->with('success', 'Fazenda atualizada!');
    }

    /**
     * Remover fazenda
     */
    public function destroy(Fazenda $fazenda)
    {
        $fazenda->delete();

        return redirect()
            ->route('fazendas.index')
            ->with('success', 'Fazenda removida!');
    }
}