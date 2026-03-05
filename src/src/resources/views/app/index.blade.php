@extends('app.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

<div class="col-md-4">
<div class="card text-white bg-success mb-3">
<div class="card-body">
<h5>Total de Leite / Semana</h5>
<h2>{{ $totalLeite }} L</h2>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card text-white bg-warning mb-3">
<div class="card-body">
<h5>Ração necessária / Semana</h5>
<h2>{{ $totalRacao }} Kg</h2>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card text-white bg-info mb-3">
<div class="card-body">
<h5>Animais Jovens Alto Consumo</h5>
<h2>{{ $animaisJovensAltoConsumo }}</h2>
</div>
</div>
</div>

</div>

<div class="row">

<div class="col-md-4">
<div class="card">
<div class="card-body">
<h5>Fazendas</h5>
<h3>{{ $totalFazendas }}</h3>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body">
<h5>Veterinários</h5>
<h3>{{ $totalVeterinarios }}</h3>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body">
<h5>Total de Gados</h5>
<h3>{{ $totalGados }}</h3>
</div>
</div>
</div>

</div>

@endsection
