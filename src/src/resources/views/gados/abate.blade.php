@extends('app.app')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
    <h2 class="mb-0">Animais para Abate</h2>

    <a href="{{ route('gados.index') }}" class="btn btn-secondary">
        Voltar
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Fazenda</th>
                        <th>Idade</th>
                        <th>Peso (KG)</th>
                        <th>Leite/semana (L)</th>
                        <th>Ração/semana (KG)</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($gadosParaAbate as $gado)
                        <tr>
                            <td>{{ $gado->codigo }}</td>
                            <td>{{ $gado->fazenda->nome }}</td>
                            <td>{{ $gado->idadeDetalhada() }}</td>
                            <td>{{ $gado->peso }}</td>
                            <td>{{ $gado->leite_semana }}</td>
                            <td>{{ $gado->racao_semana }}</td>
                            <td>
                                <form action="{{ route('gados.abater', $gado->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-warning btn-sm">
                                        Abater
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Nenhum animal disponível para abate
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection