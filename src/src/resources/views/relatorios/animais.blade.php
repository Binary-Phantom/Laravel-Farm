<h1>Animais vivos por fazenda</h1>

<table border="1">

<tr>
<th>Fazenda</th>
<th>Total animais</th>
</tr>

@foreach($fazendas as $fazenda)

<tr>
<td>{{ $fazenda->nome }}</td>

<td>
{{ $fazenda->gados->count() }}
</td>

</tr>

@endforeach

</table>
