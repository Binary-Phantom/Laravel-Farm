@extends('app.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

<div class="col-md-4">
<a href="{{ route('relatorios.leite') }}" style="text-decoration:none">
<div class="card text-white bg-success mb-3">
<div class="card-body">
<h5>Total de Leite / Semana</h5>
<h2>{{ $totalLeite }} L</h2>
</div>
</div>
</a>
</div>

<div class="col-md-4">
<a href="{{ route('relatorios.racao') }}" style="text-decoration:none">
<div class="card text-white bg-warning mb-3">
<div class="card-body">
<h5>Ração total necessária / Semana</h5>
<h2>{{ $totalRacao }} Kg</h2>
</div>
</div>
</a>
</div>

<div class="col-md-4">
<a href="{{ route('relatorios.consumo') }}" style="text-decoration:none">
<div class="card text-white bg-info mb-3">
<div class="card-body">
<h5>Animais jovens de alto consumo</h5>
<h2>{{ $animaisJovensAltoConsumo }}</h2>
</div>
</div>
</a>
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


<div class="row mt-5 g-5">

<div class="col-md-6">
<h4>Produção de Leite por Fazenda</h4>
<canvas id="graficoLeite"></canvas>
</div>

<div class="col-md-6 g-5">
<h4>Consumo de Ração por Fazenda</h4>
<canvas id="graficoRacao"></canvas>
</div>

</div>

<div class="row mt-4 g-5">

<div class="col-md-6 mx-auto">
<h4>Distribuição de Gados por Fazenda</h4>
<canvas id="graficoGados"></canvas>
</div>

</div>

<script>

const nomes = @json($nomesFazendas);
const leite = @json($leiteFazendas);
const racao = @json($racaoFazendas);
const gados = @json($gadosFazendas);

// gráfico leite
new Chart(document.getElementById('graficoLeite'), {
    type: 'bar',
    data: {
        labels: nomes,
        datasets: [{
            label: 'Leite semanal (L)',
            data: leite,
            backgroundColor: 'rgba(40,167,69,0.7)'
        }]
    }
});

// gráfico ração
new Chart(document.getElementById('graficoRacao'), {
    type: 'bar',
    data: {
        labels: nomes,
        datasets: [{
            label: 'Ração semanal (Kg)',
            data: racao,
            backgroundColor: 'rgba(255,193,7,0.7)'
        }]
    }
});

// gráfico distribuição de gados
new Chart(document.getElementById('graficoGados'), {
    type: 'pie',
    data: {
        labels: nomes,
        datasets: [{
            data: gados,
            backgroundColor: [
                '#4CAF50',
                '#2196F3',
                '#FFC107',
                '#FF5722',
                '#9C27B0'
            ]
        }]
    }
});

</script>

</div>

@endsection