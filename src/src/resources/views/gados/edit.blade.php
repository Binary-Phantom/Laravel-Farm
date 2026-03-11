@extends('app.app')

@section('content')

<div class="row justify-content-center">

<div class="col-12 col-lg-6">

<h2 class="mb-3">Editar Gado</h2>

@if ($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach

</ul>

</div>

@endif

<div class="card shadow-sm">
<div class="card-body">

<form action="{{ route('gados.update',$gado->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Leite por semana</label>
<input type="number" step="0.1" name="leite_semana"
value="{{ $gado->leite_semana }}" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Ração por semana</label>
<input type="number" name="racao_semana"
value="{{ $gado->racao_semana }}" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Peso</label>
<input type="number" step="0.1" name="peso"
value="{{ $gado->peso }}" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Nascimento</label>
<input type="date"
name="nascimento"
value="{{ $gado->nascimento->format('Y-m-d') }}"
class="form-control">
</div>

<div class="mb-3">

<label class="form-label">Fazenda</label>

<select name="fazenda_id" class="form-select">

@foreach($fazendas as $fazenda)

<option value="{{ $fazenda->id }}"
@if($gado->fazenda_id == $fazenda->id) selected @endif>

{{ $fazenda->nome }}

</option>

@endforeach

</select>

</div>

<div class="d-flex flex-column flex-md-row gap-2">

<button class="btn btn-primary">
Atualizar
</button>

<a href="{{ route('gados.index') }}" class="btn btn-secondary">
Voltar
</a>

</div>

</form>

</div>
</div>

</div>
</div>

@endsection