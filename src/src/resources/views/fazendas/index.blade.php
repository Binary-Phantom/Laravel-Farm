<!-- Página inicial menu fazenda !-->


@extends('app.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
<h2>Fazendas</h2>

<a href="{{ route('fazendas.create') }}" class="btn btn-success">
Nova Fazenda
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
<th>Nome</th>
<th>Hectares</th>
<th>Responsável</th>
<th>Veterinários</th>
<th width="180">Ações</th>
</tr>
</thead>

<tbody>

@foreach($fazendas as $fazenda)

<tr>

<td>{{ $fazenda->nome }}</td>

<td>{{ $fazenda->tamanho }}</td>

<td>{{ $fazenda->responsavel }}</td>

<td>
{{ $fazenda->veterinarios->pluck('nome')->join(', ') }}
</td>

<td>

<a href="{{ route('fazendas.edit',$fazenda->id) }}"
class="btn btn-primary btn-sm">
Editar
</a>

<form action="{{ route('fazendas.destroy',$fazenda->id) }}"
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
{{ $fazendas->links() }}
</div>

@endsection