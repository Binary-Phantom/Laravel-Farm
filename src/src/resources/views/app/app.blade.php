<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel Farm</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand" href="{{ route('app') }}">
🐄 Laravel Farm
</a>

<!-- botão hamburguer (mobile) -->
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="{{ route('fazendas.index') }}">
Fazendas
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('veterinarios.index') }}">
Veterinários
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('gados.index') }}">
Animais
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('relatorios.index') }}">
Relatórios
</a>
</li>

</ul>

</div>

</div>
</nav>

<div class="container mt-4">

@include('app.alert')

@yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>