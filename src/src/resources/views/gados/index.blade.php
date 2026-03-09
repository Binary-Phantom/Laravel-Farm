<h1>Gados</h1>

<a href="{{ route('gados.create') }}">Novo Gado</a>

@if(session('success'))

<p style="color:green">{{ session('success') }}</p>
@endif

<table border="1">
<tr>
    <th>Código</th>
    <th>Fazenda</th>
    <th>Leite/semana (Litros)</th>
    <th>Ração/semana (KG)</th>
    <th>Peso (KG)</th>
    <th>Peso (@)</th>
    <th>Nascimento</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

@foreach($gados as $gado)

<tr>
    <td>{{ $gado->codigo }}</td>
    <td>{{ $gado->fazenda->nome }}</td>
    <td>{{ $gado->leite_semana }}</td>
    <td>{{ $gado->racao_semana }}</td>
    <td>{{ $gado->peso }}</td>
    <td>{{ number_format($gado->pesoEmArrobas(), 2) }}</td>

    <td>{{ $gado->nascimento }}</td>

```
<td>
    @if($gado->estaVivo())
        Vivo
    @else
        Abatido
    @endif
</td>

<td>
    <a href="{{ route('gados.edit', $gado->id) }}">Editar</a>

    <form action="{{ route('gados.destroy', $gado->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

    @if($gado->estaVivo() && $gado->podeSerAbatido())
    <form action="{{ route('gados.abater', $gado->id) }}" method="POST" style="display:inline">
        @csrf
        <button type="submit">Abater</button>
    </form>
    @endif
</td>
```

</tr>
@endforeach

</table>

{{ $gados->links() }}