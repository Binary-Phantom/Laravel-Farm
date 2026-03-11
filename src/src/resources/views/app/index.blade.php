@extends('app.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row g-3">

<div class="col-12 col-md-4 col-lg-2">
<a href="{{ route('relatorios.index') }}" class="card-link">
<div class="card text-bg-primary shadow-sm h-100">
<div class="card-body text-center">
<h6>Leite / semana (L)</h6>
<h3>{{ $totalLeite }}</h3>
</div>
</div>
</a>
</div>

<div class="col-12 col-md-4 col-lg-2">
<a href="{{ route('relatorios.index') }}" class="card-link">
<div class="card text-bg-success shadow-sm h-100">
<div class="card-body text-center">
<h6>Ração / semana (KG)</h6>
<h3>{{ $totalRacao }}</h3>
</div>
</div>
</a>
</div>

<div class="col-12 col-md-4 col-lg-2">
<a href="{{ route('gados.index') }}" class="card-link">
<div class="card text-bg-warning shadow-sm h-100">
<div class="card-body text-center">
<h6>Animais Jovens com alto consumo</h6>
<h3>{{ $animaisJovensAltoConsumo }}</h3>
</div>
</div>
</a>
</div>

<div class="col-12 col-md-4 col-lg-2">
<a href="{{ route('gados.index') }}" class="card-link">
<div class="card text-bg-dark shadow-sm h-100">
<div class="card-body text-center">
<h6>Total de Animais</h6>
<h3>{{ $totalGados }}</h3>
</div>
</div>
</a>
</div>

<div class="col-12 col-md-4 col-lg-2">
<a href="{{ route('fazendas.index') }}" class="card-link">
<div class="card text-bg-info shadow-sm h-100">
<div class="card-body text-center">
<h6>Fazendas</h6>
<h3>{{ $totalFazendas }}</h3>
</div>
</div>
</a>
</div>

<div class="col-12 col-md-4 col-lg-2">
<a href="{{ route('veterinarios.index') }}" class="card-link">
<div class="card text-bg-secondary shadow-sm h-100">
<div class="card-body text-center">
<h6>Veterinários</h6>
<h3>{{ $totalVeterinarios }}</h3>
</div>
</div>
</a>
</div>

</div>


<div class="row mt-4 g-4">

<div class="col-12 col-lg-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Produção de Leite por Fazenda (L)</h5>
<canvas id="graficoLeite"></canvas>
</div>
</div>
</div>


<div class="col-12 col-lg-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Consumo de Ração por Fazenda (KG)</h5>
<canvas id="graficoRacao"></canvas>
</div>
</div>
</div>


<div class="col-12">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Quantidade de Animais por Fazenda</h5>
<canvas id="graficoGados"></canvas>
</div>
</div>
</div>

</div>



<script>

new Chart(
document.getElementById('graficoLeite'),
{
type: 'bar',

data: {

labels: {!! json_encode($nomesFazendas) !!},

datasets: [{
label: 'Leite / semana',

data: {!! json_encode($leiteFazendas) !!}
}]
}

}
);


new Chart(
document.getElementById('graficoRacao'),
{
type: 'bar',

data: {

labels: {!! json_encode($nomesFazendas) !!},

datasets: [{
label: 'Ração / semana',

data: {!! json_encode($racaoFazendas) !!}
}]
}

}
);



new Chart(
document.getElementById('graficoGados'),
{
type: 'pie',

data: {

labels: {!! json_encode($nomesFazendas) !!},

datasets: [{
data: {!! json_encode($gadosFazendas) !!}
}]
}

}
);

</script>

@endsection