<h1>Editar Gado</h1>

@if ($errors->any())

<ul style="color:red">
@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach
</ul>
@endif

<form action="{{ route('gados.update', $gado->id) }}" method="POST">
@csrf
@method('PUT')

<label>Leite por semana</label> <input type="number" step="0.1" name="leite_semana" value="{{ $gado->leite_semana }}" required>

<br><br>

<label>Ração por semana</label> <input type="number" name="racao_semana" value="{{ $gado->racao_semana }}" required>

<br><br>

<label>Peso</label> <input type="number" step="0.1" name="peso" value="{{ $gado->peso }}" required>

<br><br>

<label>Data de nascimento</label> <input type="date" name="nascimento" value="{{ $gado->nascimento->format('Y-m-d') }}" required>

<br><br>

<label>Fazenda</label> <select name="fazenda_id">

@foreach($fazendas as $fazenda)

<option value="{{ $fazenda->id }}"
@if($gado->fazenda_id == $fazenda->id) selected @endif>
{{ $fazenda->nome }}
</option>
@endforeach

</select>

<br><br>

<button type="submit">Atualizar</button>

</form>

<br>

<a href="{{ route('gados.index') }}">Voltar</a>
