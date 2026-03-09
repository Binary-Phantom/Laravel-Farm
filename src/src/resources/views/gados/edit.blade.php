@extends('app.app')

@section('content')

<h2>Editar Gado</h2>

@if ($errors->any())

<div class="alert alert-danger">
<ul>

@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach

</ul>
</div>

@endif

<div class="card">
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
<input type="date" name="nascimento"
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

<button class="btn btn-primary">
Atualizar
</button>

<a href="{{ route('gados.index') }}" class="btn btn-secondary">
Voltar
</a>

</form>

</div>
</div>

@endsection