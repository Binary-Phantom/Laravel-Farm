@extends('app.app')

@section('content')

<div class="row justify-content-center">

<div class="col-12 col-lg-6">

<h2 class="mb-3">Editar Veterinário</h2>

<div class="card shadow-sm">
<div class="card-body">

<form action="{{ route('veterinarios.update', $veterinario->crmv) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label class="form-label">Nome</label>

<input type="text"
name="nome"
value="{{ old('nome', $veterinario->nome) }}"
class="form-control">

</div>


<div class="mb-3">

<label class="form-label">CRMV</label>

<input type="text"
name="crmv"
value="{{ old('crmv', $veterinario->crmv) }}"
class="form-control">

</div>


<div class="d-flex flex-column flex-md-row gap-2">

<button class="btn btn-primary">
Atualizar
</button>

<a href="{{ route('veterinarios.index') }}"
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