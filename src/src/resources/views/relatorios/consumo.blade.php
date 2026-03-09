@extends('app.app')

@section('content')

<h2>Animais jovens de alto consumo</h2>

<table class="table table-bordered">

<tr>
<th>Código</th>
<th>Fazenda</th>
<th>Idade</th>
<th>Ração por dia</th>
</tr>

@foreach($gados as $gado)

<tr>
<td>{{ $gado->codigo }}</td>
<td>{{ $gado->fazenda->nome }}</td>
<td>{{ $gado->idadeDetalhada() }}</td>
<td>{{ number_format($gado->racaoPorDia(),2) }} Kg</td>
</tr>

@endforeach

</table>

@endsection
