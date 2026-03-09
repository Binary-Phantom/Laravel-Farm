@extends('app.app')
@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Relatório Consolidado das Fazendas</h2>
</div>

<div class="card">
<div class="card-body">

<table class="table table-striped table-bordered">

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

@endsection