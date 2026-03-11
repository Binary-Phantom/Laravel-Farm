@extends('app.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Animais vivos por fazenda</h2>
</div>

<div class="card shadow-sm">
<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-bordered align-middle">

<thead class="table-dark">
<tr>
<th>Fazenda</th>
<th>Total animais</th>
</tr>
</thead>

<tbody>

@foreach($fazendas as $fazenda)

<tr>

<td>{{ $fazenda->nome }}</td>

<td>{{ $fazenda->gados->count() }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>
</div>
</div>

@endsection