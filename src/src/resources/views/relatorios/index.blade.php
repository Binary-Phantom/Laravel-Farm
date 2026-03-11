@extends('app.app')
@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">

<h2 class="mb-0">Relatório Consolidado das Fazendas</h2>

<a href="{{ route('relatorios.abate') }}" class="btn btn-success">
Animais já Abatidos
</a>

</div>

<div class="card shadow-sm">
<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-bordered align-middle">

<thead class="table-dark">
<tr>
<th>Fazenda</th>
<th>Responsável</th>
<th>Tamanho (Ha)</th>
<th>Total de Animais</th>
<th>Leite / semana</th>
<th>Ração / semana</th>
<th>Peso médio</th>
</tr>
</thead>

<tbody>

@foreach($fazendas as $fazenda)

<tr>
<td>{{ $fazenda->nome }}</td>
<td>{{ $fazenda->responsavel }}</td>
<td>{{ $fazenda->tamanho }}</td>
<td>{{ $fazenda->total_animais ?? 0 }}</td>
<td>{{ $fazenda->total_leite ?? 0 }}</td>
<td>{{ $fazenda->total_racao ?? 0 }}</td>
<td>{{ number_format($fazenda->peso_medio ?? 0,1) }}</td>
</tr>

@endforeach

</tbody>

</table>

</div>
</div>
</div>

@endsection