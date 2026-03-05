<h1>Consumo de Ração por Fazenda</h1>

<table border="1">
<tr>
<th>Fazenda</th>
<th>Ração / semana</th>
</tr>

@foreach($fazendas as $fazenda)

<tr>
<td>{{ $fazenda->nome }}</td>

<td>
{{ $fazenda->gados->sum('racao_semana') }}
</td>

</tr>

@endforeach

</table>