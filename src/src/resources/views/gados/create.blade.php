@extends('app.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-lg-6">
        <h2 class="mb-3">Novo Gado</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('gados.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Código</label>
                        <input type="number" name="codigo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Leite por semana (Litros)</label>
                        <input type="number" step="0.1" name="leite_semana" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ração por semana (Kg)</label>
                        <input type="number" name="racao_semana" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Peso (Kg)</label>
                        <input type="number" step="0.1" name="peso" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nascimento</label>
                        <input type="date" name="nascimento" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fazenda</label>
                        <select name="fazenda_id" class="form-select" required>
                            @foreach($fazendas as $fazenda)
                                <option value="{{ $fazenda->id }}">
                                    {{ $fazenda->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-2">
                        <button class="btn btn-success">
                            Salvar
                        </button>

                        <a href="{{ route('gados.index') }}" class="btn btn-secondary">
                            Voltar
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection