@extends('app.app')
@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Produção de Leite por Fazenda</h2>
</div>

<div class="card">
<div class="card-body">

<table class="table table-striped table-bordered">

<thead class="table-dark">
<tr>
<th>Fazenda</th>
<th>Total de leite / semana</th>
</tr>
</thead>

<tbody>

@foreach($fazendas as $fazenda)

<tr>
<td>{{ $fazenda->nome }}</td>

<td>
{{ $fazenda->gados->sum('leite_semana') }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>
</div>

@endsection