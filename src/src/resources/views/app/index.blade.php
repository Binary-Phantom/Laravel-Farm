@extends('app.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row g-3">

<div class="col-12 col-md-4">
<div class="card shadow-sm border-0 text-bg-primary">
<div class="card-body text-center">
<h6>Total de Leite (L)</h6>
<h2>{{ $totalLeite }}</h2>
</div>
</div>
</div>

<div class="col-12 col-md-4">
<div class="card shadow-sm border-0 text-bg-success">
<div class="card-body text-center">
<h6>Ração Necessária (kg)</h6>
<h2>{{ $totalRacao }}</h2>
</div>
</div>
</div>

<div class="col-12 col-md-4">
<div class="card shadow-sm border-0 text-bg-warning">
<div class="card-body text-center">
<h6>Animais Jovens</h6>
<h2>{{ $animaisJovens }}</h2>
</div>
</div>
</div>

</div>


<div class="row mt-4 g-4">

<div class="col-12 col-lg-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Produção de Leite</h5>

<canvas id="graficoLeite"></canvas>

</div>
</div>
</div>

<div class="col-12 col-lg-6">
<div class="card shadow-sm">
<div class="card-body">
<h5 class="mb-3">Consumo de Ração</h5>

<canvas id="graficoRacao"></canvas>

</div>
</div>
</div>

</div>


<script>

const graficoLeite = new Chart(
document.getElementById('graficoLeite'),
{
type: 'bar',

data: {
labels: {!! json_encode($fazendas->pluck('nome')) !!},

datasets: [{
label: 'Leite por Fazenda',
data: {!! json_encode($fazendas->map(fn($f)=>$f->gados->sum('leite'))) !!}
}]
}

}
);



const graficoRacao = new Chart(
document.getElementById('graficoRacao'),
{
type: 'pie',

data: {
labels: ['Ração necessária','Outros'],

datasets: [{
data: [{{ $totalRacao }}, 100]
}]
}

}
);

</script>

@endsection