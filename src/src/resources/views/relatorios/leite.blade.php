<h1>Produção de Leite por Fazenda</h1>

<table border="1">
<tr>
<th>Fazenda</th>
<th>Total de leite / semana</th>
</tr>

@foreach($fazendas as $fazenda)

<tr>
<td>{{ $fazenda->nome }}</td>

<td>
{{ $fazenda->gados->sum('leite_semana') }}
</td>

</tr>

@endforeach

</table>