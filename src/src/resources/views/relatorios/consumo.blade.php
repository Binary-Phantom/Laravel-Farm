@extends('app.app')
@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Animais jovens de alto consumo</h2>
</div>

<div class="card">
<div class="card-body">

<table class="table table-striped table-bordered">

<thead class="table-dark">
<tr>
<th>Código</th>
<th>Fazenda</th>
<th>Idade</th>
<th>Ração por dia</th>
</tr>
</thead>

<tbody>

@foreach($gados as $gado)

<tr>
<td>{{ $gado->codigo }}</td>
<td>{{ $gado->fazenda->nome }}</td>
<td>{{ $gado->idadeDetalhada() }}</td>
<td>{{ number_format($gado->racaoPorDia(),2) }} Kg</td>
</tr>

@endforeach

</tbody>

</table>

</div>
</div>

@endsection