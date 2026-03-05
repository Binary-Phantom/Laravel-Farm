<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Gado;
use Carbon\Carbon;

class RelatorioController extends Controller
{

    // produção de leite por fazenda
    public function leitePorFazenda()
    {
        $fazendas = Fazenda::with('gados')->get();

        return view('relatorios.leite', compact('fazendas'));
    }

    // consumo de ração por fazenda
    public function racaoPorFazenda()
    {
        $fazendas = Fazenda::with('gados')->get();

        return view('relatorios.racao', compact('fazendas'));
    }

    // animais abatidos por período
    public function abatePeriodo(Request $request)
    {
        $inicio = $request->inicio;
        $fim = $request->fim;

        $gados = Gado::whereNotNull('abatido_em')
            ->whereBetween('abatido_em', [$inicio, $fim])
            ->get();

        return view('relatorios.abate', compact('gados', 'inicio', 'fim'));
    }

    // animais vivos por fazenda
    public function animaisPorFazenda()
    {
        $fazendas = Fazenda::with(['gados' => function($q){
            $q->whereNull('abatido_em');
        }])->get();

        return view('relatorios.animais', compact('fazendas'));
    }

    public function index()
{
    $fazendas = Fazenda::with(['gados' => function($q){
        $q->whereNull('abatido_em');
    }])->get();

    $totalFazendas = Fazenda::count();

    $totalAnimais = Gado::whereNull('abatido_em')->count();

    $totalLeite = Gado::whereNull('abatido_em')->sum('leite_semana');

    $totalRacao = Gado::whereNull('abatido_em')->sum('racao_semana');

    return view('relatorios.index', compact(
        'fazendas',
        'totalFazendas',
        'totalAnimais',
        'totalLeite',
        'totalRacao'
    ));
}

}