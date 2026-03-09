@extends('app.app')

@section('content')

<h2>Animais para Abate</h2>

<a href="{{ route('gados.index') }}" class="btn btn-secondary mb-3">
Voltar
</a>

@if(session('success'))

<div class="alert alert-success">
{{ session('success') }}
</div>

@endif

<div class="card">
<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
<th>Código</th>
<th>Fazenda</th>
<th>Idade</th>
<th>Peso</th>
<th>Leite/semana</th>
<th>Ração/semana</th>
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

<form action="{{ route('gados.abater',$gado->id) }}" method="POST">

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

@endsection