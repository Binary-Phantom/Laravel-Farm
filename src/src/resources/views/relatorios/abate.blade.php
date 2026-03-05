<h1>Relatório de Abates</h1>

<form method="GET">

Data início
<input type="date" name="inicio">

Data fim
<input type="date" name="fim">

<button type="submit">
Buscar
</button>

</form>

<table border="1">

<tr>
<th>Código</th>
<th>Peso</th>
<th>Data abate</th>
</tr>

@foreach($gados as $gado)

<tr>
<td>{{ $gado->codigo }}</td>
<td>{{ $gado->peso }}</td>
<td>{{ $gado->abatido_em }}</td>
</tr>

@endforeach

</table>