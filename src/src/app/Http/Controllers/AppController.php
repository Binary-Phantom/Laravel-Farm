<?php

namespace App\Http\Controllers;

use App\Models\Gado;
use App\Models\Fazenda;
use App\Models\Veterinario;
use Carbon\Carbon;

class AppController extends Controller
{
    public function index()
    {
        // considerar apenas animais vivos
        $gados = Gado::whereNull('abatido_em');

        $totalLeite = $gados->sum('leite_semana');

        $totalRacao = $gados->sum('racao_semana');

        // animais com até 1 ano e que consomem mais de 500kg de ração por semana
        $animaisJovensAltoConsumo = Gado::whereNull('abatido_em')
            ->whereDate('nascimento', '>=', Carbon::now()->subYear())
            ->where('racao_semana', '>', 500)
            ->count();

        $totalGados = Gado::whereNull('abatido_em')->count();

        $totalFazendas = Fazenda::count();

        $totalVeterinarios = Veterinario::count();

        return view('app.index', compact(
            'totalLeite',
            'totalRacao',
            'animaisJovensAltoConsumo',
            'totalGados',
            'totalFazendas',
            'totalVeterinarios'
        ));
    }
}