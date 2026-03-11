@extends('app.app')

@section('content')

<div class="row justify-content-center">

<div class="col-12 col-lg-6">

<h2 class="mb-3">Editar Fazenda</h2>

<div class="card shadow-sm">
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

<div class="mb-2">

<a href="{{ route('veterinarios.create') }}"
class="btn btn-sm btn-success">

+ Novo Veterinário

</a>

</div>

<select name="veterinarios[]"
class="form-select"
multiple
size="5">

@foreach($veterinarios as $vet)

<option value="{{ $vet->crmv }}"
{{ $fazenda->veterinarios->contains('crmv',$vet->crmv) ? 'selected' : '' }}>

{{ $vet->nome }} - CRMV {{ $vet->crmv }}

</option>

@endforeach

</select>

</div>


<div class="d-flex flex-column flex-md-row gap-2">

<button class="btn btn-primary">
Atualizar
</button>

<a href="{{ route('fazendas.index') }}"
class="btn btn-secondary">
Voltar
</a>

</div>

</form>

</div>
</div>

</div>
</div>

@endsection