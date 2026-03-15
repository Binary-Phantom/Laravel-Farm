@extends('app.app')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">

<h2 class="mb-0">Gados</h2>

<div class="d-flex flex-column flex-md-row gap-2">

<a href="{{ route('gados.create') }}" class="btn btn-success">
Novo Gado
</a>

<a href="{{ route('gados.abate') }}" class="btn btn-danger">
Elegíveis para Abate
</a>

</div>

</div>


<div class="card shadow-sm">
<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-bordered align-middle">

<thead class="table-dark">

<tr>
<th>Código</th>
<th>Fazenda</th>
<th>Leite/semana (L)</th>
<th>Ração/semana (Kg)</th>
<th>Peso (Kg)</th>
<th>Peso (@)</th>
<th>Nascimento</th>
<th>Status</th>
<th width="220">Ações</th>
</tr>

</thead>

<tbody>

@foreach($gados as $gado)

<tr>

<td>{{ $gado->codigo }}</td>

<td>{{ $gado->fazenda->nome }}</td>

<td>{{ $gado->leite_semana }}</td>

<td>{{ $gado->racao_semana }}</td>

<td>{{ $gado->peso }}</td>

<td>{{ number_format($gado->pesoEmArrobas(),2) }}</td>

<td>{{ $gado->nascimento->format('d/m/Y') }}</td>

<td>

@if($gado->estaVivo())
<span class="badge bg-success">Vivo</span>
@else
<span class="badge bg-danger">Abatido</span>
@endif

</td>

<td>

<div class="d-flex flex-column flex-md-row gap-2">

<a href="{{ route('gados.edit',$gado->id) }}"
class="btn btn-primary btn-sm">
Editar
</a>

<form action="{{ route('gados.destroy',$gado->id) }}"
method="POST">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Excluir
</button>

</form>

@if($gado->estaVivo() && $gado->podeSerAbatido())

<form action="{{ route('gados.abater',$gado->id) }}"
method="POST">

@csrf

<button class="btn btn-warning btn-sm">
Abater
</button>

</form>

@endif

</div>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>
</div>

<div class="mt-3">
{{ $gados->links() }}
</div>

@endsection
