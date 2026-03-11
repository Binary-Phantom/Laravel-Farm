@extends('app.app')

@section('content')

<div class="row justify-content-center">

<div class="col-12 col-lg-6">

<h2 class="mb-3">Novo Veterinário</h2>

<div class="card shadow-sm">
<div class="card-body">

<form action="{{ route('veterinarios.store') }}" method="POST">

@csrf

<div class="mb-3">

<label class="form-label">Nome</label>

<input type="text"
name="nome"
class="form-control"
placeholder="Digite o nome do veterinário"
required>

</div>


<div class="mb-3">

<label class="form-label">CRMV</label>

<input type="text"
name="crmv"
class="form-control"
placeholder="Digite o CRMV"
maxlength="5"
required>

</div>


<div class="d-flex flex-column flex-md-row gap-2">

<button class="btn btn-success">
Salvar
</button>

<a href="{{ route('veterinarios.index') }}"
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