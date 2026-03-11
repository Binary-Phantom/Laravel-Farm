@extends('app.app')

@section('content')

<h2 class="mb-4">📊 Dashboard</h2>

<div class="row g-3">

<div class="col-12 col-md-4 col-lg-2">
<div class="card text-bg-primary shadow-sm">
<div class="card-body text-center">
<h6>Leite / semana</h6>
<h3>{{ $totalLeite }}</h3>
</div>
</div>
</div>

<div class="col-12 col-md-4 col-lg-2">
<div class="card text-bg-success shadow-sm">
<div class="card-body text-center">
<h6>Ração / semana</h6>
<h3>{{ $totalRacao }}</h3>
</div>
</div>
</div>

<div class="col-12 col-md-4 col-lg-2">
<div class="card text-bg-warning shadow-sm">
<div class="card-body text-center">
<h6>Jovens alto consumo</h6>
<h3>{{ $animaisJovensAltoConsumo }}</h3>
</div>
</div>
</div>

<div class="col-12 col-md-4 col-lg-2">
<div class="card text-bg-dark shadow-sm">
<div class="card-body text-center">
<h6>Total gados</h6>
<h3>{{ $totalGados }}</h3>
</div>
</div>
</div>

<div class="col-12 col-md-4 col-lg-2">
<div class="card text-bg-info shadow-sm">
<div class="card-body text-center">
<h6>Fazendas</h6>
<h3>{{ $totalFazendas }}</h3>
</div>
</div>
</div>

<div class="col-12 col-md-4 col-lg-2">
<div class="card text-bg-secondary shadow-sm">
<div class="card-body text-center">
<h6>Veterinários</h6>
<h3>{{ $totalVeterinarios }}</h3>
</div>
</div>
</div>

</div>


<div class="row mt-4 g-4">

<div class="col-12 col-lg-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Produção de Leite por Fazenda</h5>
<canvas id="graficoLeite"></canvas>
</div>
</div>
</div>


<div class="col-12 col-lg-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Consumo de Ração por Fazenda</h5>
<canvas id="graficoRacao"></canvas>
</div>
</div>
</div>


<div class="col-12">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Quantidade de Gados por Fazenda</h5>
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