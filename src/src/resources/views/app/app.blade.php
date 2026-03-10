<!DOCTYPE html>
<html>
<head>
    <title>Laravel Farm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand" href="{{ route('app') }}">
Laravel Farm
</a>

<ul class="navbar-nav">

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
</nav>

<div class="container mt-4">

@include('app.alert')

@yield('content')

</div>

</body>
</html>
