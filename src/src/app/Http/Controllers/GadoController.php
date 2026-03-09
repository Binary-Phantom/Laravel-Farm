<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gado;
use App\Models\Fazenda;

class GadoController extends Controller
{
    public function index()
    {
        $gados = Gado::with('fazenda')->paginate(10);

        return view('gados.index', compact('gados'));
    }

    public function create()
    {
        $fazendas = Fazenda::all();

        return view('gados.create', compact('fazendas'));
    }

    public function store(Request $request)
    {
        $request->validate(
        [
            'codigo' => [
                'required',
                function ($attribute, $value, $fail) {

                    $existe = Gado::where('codigo', $value)
                        ->whereNull('abatido_em')
                        ->exists();

                    if ($existe) {
                        $fail('Já existe um animal vivo com esse código.');
                    }
                }
            ],

            'leite_semana' => 'required|numeric',
            'racao_semana' => 'required|integer',
            'peso' => 'required|numeric',
            'nascimento' => 'required|date|before_or_equal:today',
            'fazenda_id' => 'required|exists:fazendas,id',
        ],
        [
            'nascimento.before_or_equal' => 'A data de nascimento não pode ser futura.',
            'nascimento.required' => 'A data de nascimento é obrigatória.'
        ]);

        $fazenda = Fazenda::findOrFail($request->fazenda_id);

        // limite de animais
        $limite = $fazenda->tamanho * 18;

        $totalAnimais = $fazenda->gados()
            ->whereNull('abatido_em')
            ->count();

        if ($totalAnimais >= $limite) {
            return back()
                ->withInput()
                ->withErrors([
                    'fazenda_id' => 'Essa fazenda já atingiu o limite de animais permitido.'
                ]);
        }

        Gado::create($request->all());

        return redirect()
            ->route('gados.index')
            ->with('success', 'Animal cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $gado = Gado::findOrFail($id);
        $fazendas = Fazenda::all();

        return view('gados.edit', compact('gado', 'fazendas'));
    }

    public function update(Request $request, $id)
    {
        $gado = Gado::findOrFail($id);

        $request->validate([
            'leite_semana' => 'required|numeric',
            'racao_semana' => 'required|integer',
            'peso' => 'required|numeric',
            'nascimento' => 'required|date|before_or_equal:today',
            'fazenda_id' => 'required|exists:fazendas,id',
            [
            'nascimento.before_or_equal' => 'A data de nascimento não pode ser futura.',
            'nascimento.required' => 'A data de nascimento é obrigatória.'
            ]
        ]);

        $gado->update($request->all());

        return redirect()
            ->route('gados.index')
            ->with('success', 'Animal atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $gado = Gado::findOrFail($id);

        $gado->delete();

        return redirect()
            ->route('gados.index')
            ->with('success', 'Animal removido!');
    }

    public function abater($id)
    {
        $gado = Gado::findOrFail($id);

        try {
            $gado->abater();
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        return redirect()
            ->route('gados.index')
            ->with('success', 'Animal enviado para abate.');
    }

    public function paraAbate()
    {
        $gadosParaAbate = Gado::all()->filter(function ($gado) {
            return $gado->estaVivo() && $gado->podeSerAbatido();
        });

        return view('gados.abate', compact('gadosParaAbate'));
    }
}