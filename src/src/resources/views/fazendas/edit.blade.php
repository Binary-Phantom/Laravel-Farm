@extends('app.app')

@section('content')

<h2>Editar Fazenda</h2>

<div class="card">
<div class="card-body">

<form action="{{ route('fazendas.update',$fazenda->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Nome da Fazenda</label>

<input type="text"
name="nome"
value="{{ $fazenda->nome }}"
class="form-control">
</div>

<div class="mb-3">

<label class="form-label">Tamanho (Hectares)</label>

<input type="number"
step="0.01"
name="tamanho"
value="{{ $fazenda->tamanho }}"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">Responsável</label>

<input type="text"
name="responsavel"
value="{{ $fazenda->responsavel }}"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">Veterinários</label>

<br>

<a href="{{ route('veterinarios.create') }}" class="btn btn-sm btn-success mb-2">
+ Novo Veterinário
</a>

<select name="veterinarios[]" class="form-select" multiple size="5">

@foreach($veterinarios as $vet)

<option value="{{ $vet->crmv }}"
{{ $fazenda->veterinarios->contains('crmv',$vet->crmv) ? 'selected' : '' }}>

{{ $vet->nome }} - CRMV {{ $vet->crmv }}

</option>

@endforeach

</select>

</div>

<button class="btn btn-primary">
Atualizar
</button>

<a href="{{ route('fazendas.index') }}" class="btn btn-secondary">
Voltar
</a>

</form>

</div>
</div>

@endsection