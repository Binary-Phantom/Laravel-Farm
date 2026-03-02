<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Veterinario;


class FazendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fazendas = Fazenda::paginate(10);

        return view('fazendas.index', compact('fazendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $veterinarios = Veterinario::all();

        return view(
        'fazendas.create',
        compact('veterinarios')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|unique:fazendas,nome',
        'tamanho_hectares' => 'required|numeric|min:1',
        'veterinarios' => 'required|array|min:1'
    ]);

    // cria fazenda
    $fazenda = Fazenda::create([
        'nome' => $request->nome,
        'tamanho_hectares' => $request->tamanho_hectares,
    ]);

    // associa veterinários
    $fazenda->veterinarios()->sync(
        $request->veterinarios
    );

    return redirect()
        ->route('fazendas.index')
        ->with('success', 'Fazenda criada com veterinário!');
}

    /**
     * Display the specified resource.
     */
    //public function show(string $id)
   // {
        //
  //  }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fazenda $fazenda)
    {
        $veterinarios = Veterinario::all();

        return view(
        'fazendas.edit',
        compact('fazenda', 'veterinarios')
        );
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Fazenda $fazenda)
{
    $request->validate([
        'nome' => 'required|unique:fazendas,nome,' . $fazenda->id,
        'tamanho_hectares' => 'required|numeric|min:1',
        'veterinarios' => 'required|array|min:1'
    ]);

    $fazenda->update([
        'nome' => $request->nome,
        'tamanho_hectares' => $request->tamanho_hectares,
    ]);

    $fazenda->veterinarios()
        ->sync($request->veterinarios);

    return redirect()
        ->route('fazendas.index')
        ->with('success','Atualizada!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Fazenda $fazenda)
    {
        $fazenda->delete();

        return redirect()
        ->route('fazendas.index')
        ->with('success','Removida!');
    }
}
