<h1>Animais para Abate</h1>

<a href="{{ route('gados.index') }}">Voltar para lista de gados</a>

<br><br>

@if(session('success'))

<p style="color:green">{{ session('success') }}</p>
@endif

@if ($errors->any())

<ul style="color:red">
@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach
</ul>
@endif

<table border="1">

<tr>
    <th>Código</th>
    <th>Fazenda</th>
    <th>Idade</th>
    <th>Peso (kg)</th>
    <th>Leite/semana</th>
    <th>Ração/semana</th>
    <th>Ação</th>
</tr>

@forelse($gadosParaAbate as $gado)

<tr>
    <td>{{ $gado->codigo }}</td>

```
<td>{{ $gado->fazenda->nome }}</td>

<td>{{ $gado->idade() }} anos</td>

<td>{{ $gado->peso }}</td>

<td>{{ $gado->leite_semana }}</td>

<td>{{ $gado->racao_semana }}</td>

<td>
    <form action="{{ route('gados.abater', $gado->id) }}" method="POST">
        @csrf
        <button type="submit">
            Abater
        </button>
    </form>
</td>
```

</tr>

@empty

<tr>
<td colspan="7">
Nenhum animal disponível para abate.
</td>
</tr>

@endforelse

</table>
