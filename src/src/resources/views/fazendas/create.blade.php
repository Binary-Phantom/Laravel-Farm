@extends('app.app')

@section('content')

<div class="row justify-content-center">

<div class="col-12 col-lg-6">

<h2 class="mb-3">Nova Fazenda</h2>

<div class="card shadow-sm">
<div class="card-body">

<form action="{{ route('fazendas.store') }}" method="POST">

@csrf

<div class="mb-3">

<label class="form-label">Nome</label>

<input type="text"
name="nome"
class="form-control"
required>

</div>


<div class="mb-3">

<label class="form-label">Tamanho (hectares)</label>

<input type="number"
step="0.01"
name="tamanho"
class="form-control"
required>

</div>


<div class="mb-3">

<label class="form-label">Responsável</label>

<input type="text"
name="responsavel"
class="form-control"
required>

</div>


<div class="mb-3">

<label class="form-label">Veterinários Vinculados</label>

<select name="veterinarios[]"
class="form-select"
multiple
size="5"
required>

@foreach($veterinarios as $vet)

<option value="{{ $vet->crmv }}">
{{ $vet->nome }} - CRMV {{ $vet->crmv }}
</option>

@endforeach

</select>

</div>


<div class="d-flex flex-column flex-md-row gap-2">

<button class="btn btn-success">
Salvar
</button>

<a href="{{ route('fazendas.index') }}"
class="btn btn-secondary">
Cancelar
</a>

</div>

</form>

</div>
</div>

</div>
</div>

@endsection