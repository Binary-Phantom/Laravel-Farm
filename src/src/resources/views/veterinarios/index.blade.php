@extends('app.app')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">

<h2 class="mb-0">Veterinários</h2>

<a href="{{ route('veterinarios.create') }}" class="btn btn-primary">
Novo Veterinário
</a>

</div>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<div class="card shadow-sm">
<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-bordered align-middle">

<thead class="table-dark">

<tr>
<th>CRMV</th>
<th>Nome</th>
<th width="180">Ações</th>
</tr>

</thead>

<tbody>

@foreach($veterinarios as $veterinario)

<tr>

<td>{{ $veterinario->crmv }}</td>

<td>{{ $veterinario->nome }}</td>

<td>

<div class="d-flex flex-column flex-md-row gap-2">

<a href="{{ route('veterinarios.edit', $veterinario->crmv) }}"
class="btn btn-primary btn-sm">
Editar
</a>

<form action="{{ route('veterinarios.destroy', $veterinario->crmv) }}"
method="POST">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Excluir
</button>

</form>

</div>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>
</div>
</div>

<div class="mt-3">
{{ $veterinarios->links() }}
</div>

@endsection