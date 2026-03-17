@extends('app.app')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">

<h2 class="mb-0">Fazendas</h2>

<a href="{{ route('fazendas.create') }}" class="btn btn-success">
Nova Fazenda
</a>

</div>



<div class="card shadow-sm">
<div class="card-body">

<div class="table-responsive">

<table class="table table-striped table-bordered align-middle">

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

<div class="d-flex flex-column flex-md-row gap-2">

<a href="{{ route('fazendas.edit',$fazenda->id) }}"
class="btn btn-primary btn-sm">
Editar
</a>

<form action="{{ route('fazendas.destroy',$fazenda->id) }}"
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
{{ $fazendas->links() }}
</div>

@endsection