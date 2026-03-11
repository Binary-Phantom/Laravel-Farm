<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinario;

class VeterinarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Pega todos os veterinários paginados (10 por página)
    $veterinarios = Veterinario::paginate(10);

    // Passa para a view
    return view('veterinarios.index', compact('veterinarios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('veterinarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nome' => 'required|string|max:255',
        'crmv' => 'required|string|max:20|unique:veterinarios,crmv' //substitui o id padrão pelo o crmv
        ],[
        'crmv.unique' => 'CRMV já cadastrado'
        ]);

        Veterinario::create($request->all());

        return redirect()
        ->route('veterinarios.index')
        ->with('success', 'Veterinário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veterinario $veterinario)
        {
        return view('veterinarios.edit', compact('veterinario'));
        }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Veterinario $veterinario)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'crmv' => 'required|string|max:20|unique:veterinarios,crmv,' . $veterinario->crmv . ',crmv',
    
        ], [

        'crmv.unique' => 'CRMV já cadastrado'
        
        ]);

    $veterinario->nome = $request->nome;
    $veterinario->crmv = $request->crmv; // permite alteração de crmv
    $veterinario->save();

    return redirect()->route('veterinarios.index')->with('success', 'Veterinário atualizado!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veterinario $veterinario)
    {
        $veterinario->delete();

        return redirect()
        ->route('veterinarios.index')
        ->with('success', 'Veterinário removido!');
    }
}
