<h1>Relatório Consolidado das Fazendas</h1>

<table border="1">
    <tr>
        <th>Fazenda</th>
        <th>Responsável</th>
        <th>Tamanho (ha)</th>
        <th>Total Animais</th>
        <th>Leite / semana</th>
        <th>Ração / semana</th>
        <th>Peso médio</th>
    </tr>

@foreach($fazendas as $fazenda)
<tr>
    <td>{{ $fazenda->nome }}</td>
    <td>{{ $fazenda->responsavel }}</td>
    <td>{{ $fazenda->tamanho }}</td>
    <td>{{ $fazenda->total_animais ?? 0 }}</td>
    <td>{{ $fazenda->total_leite ?? 0 }}</td>
    <td>{{ $fazenda->total_racao ?? 0 }}</td>
    <td>{{ number_format($fazenda->peso_medio ?? 0,1) }}</td>
</tr>
@endforeach

</table>
