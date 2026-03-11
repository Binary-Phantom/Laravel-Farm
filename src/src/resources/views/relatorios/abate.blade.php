@extends('app.app')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
<h2 class="mb-0">Relatório de Abates</h2>
</div>

<div class="card mb-3 shadow-sm">
<div class="card-body">

<form method="GET" class="row g-3">

<div class="col-12 col-md-4">
<label class="form-label">Data início</label>
<input type="date" name="inicio" class="form-control">
</div>

<div class="col-12 col-md-4">
<label class="form-label">Data fim</label>
<input type="date" name="fim" class="form-control">
</div>

<div class="col-12 col-md-4 align-self-end">

<button type="submit" class="btn btn-primary w-100">
Buscar
</button>

</div>

</form>

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
<th>Peso (Kg)</th>
<th>Peso (@)</th>
<th>Data abate</th>
</tr>
</thead>

<tbody>

@foreach($gados as $gado)

<tr>

<td>{{ $gado->codigo }}</td>

<td>{{ $gado->fazenda->nome ?? '-' }}</td>

<td>{{ $gado->peso }}</td>

<td>{{ number_format($gado->peso / 15,2) }} @</td>

<td>{{ $gado->abatido_em->format('d/m/Y') }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>
</div>

@endsection