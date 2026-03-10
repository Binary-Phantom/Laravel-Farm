<!-- Página inicial menu vets !-->

@extends('app.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Veterinários</h2>

<a href="{{ route('veterinarios.create') }}" class="btn btn-primary">
Novo Veterinário
</a>
</div>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<div class="card">
<div class="card-body">

<table class="table table-striped table-bordered">

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

<a href="{{ route('veterinarios.edit', $veterinario->crmv) }}"
class="btn btn-primary btn-sm">
Editar
</a>

<form action="{{ route('veterinarios.destroy', $veterinario->crmv) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Excluir
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>
</div>

<div class="mt-3">
{{ $veterinarios->links() }}
</div>

@endsection