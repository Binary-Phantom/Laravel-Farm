<h1>Novo Gado</h1>

@if ($errors->any())

<ul style="color:red">
@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach
</ul>
@endif

<form action="{{ route('gados.store') }}" method="POST">
@csrf

<label>Código</label> <input type="number" name="codigo" required>

<br><br>

<label>Leite por semana (Litros)</label> <input type="number" step="0.1" name="leite_semana" required>

<br><br>

<label>Ração por semana (Kg)</label> <input type="number" name="racao_semana" required>

<br><br>

<label>Peso (Kg)</label> <input type="number" step="0.1" name="peso" required>

<br><br>

<label>Data de nascimento</label> <input type="date" name="nascimento" required>

<br><br>

<label>Fazenda</label> <select name="fazenda_id" required>
@foreach($fazendas as $fazenda)

<option value="{{ $fazenda->id }}">
{{ $fazenda->nome }}
</option>
@endforeach
</select>

<br><br>

<button type="submit">Salvar</button>

</form>

<br>

<a href="{{ route('gados.index') }}">Voltar</a>
