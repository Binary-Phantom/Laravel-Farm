@extends('app.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Relatório de Abates</h2>
</div>

<div class="card mb-3">
<div class="card-body">

<form method="GET" class="row g-3">

<div class="col-md-4">
<label class="form-label">Data início</label>
<input type="date" name="inicio" class="form-control">
</div>

<div class="col-md-4">
<label class="form-label">Data fim</label>
<input type="date" name="fim" class="form-control">
</div>

<div class="col-md-4 align-self-end">
<button type="submit" class="btn btn-primary">
Buscar
</button>
</div>

</form>

</div>
</div>

<div class="card">
<div class="card-body">

<table class="table table-striped table-bordered">

<thead class="table-dark">
<tr>
<th>Código</th>
<th>Fazenda</th>
<th>Peso (Kg)</th>
<th>Peso (Arrobas)</th>
<th>Data abate</th>
</tr>
</thead>

<tbody>

@foreach($gados as $gado)

<tr>
<td>{{ $gado->codigo }}</td>

<td>
{{ $gado->fazenda->nome ?? '-' }}
</td>

<td>
{{ $gado->peso }}
</td>

<td>
{{ number_format($gado->peso / 15, 2) }} @
</td>

<td>
{{ $gado->abatido_em->format('d/m/Y') }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>
</div>

@endsection