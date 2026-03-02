<h1>Fazendas</h1>

<a href="{{ route('fazendas.create') }}">
    Nova Fazenda
</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1">
<tr>
    <th>Nome</th>
    <th>Hectares</th>
    <th>Responsável</th>
    <th>Ações</th>
</tr>

@foreach($fazendas as $fazenda)
<tr>
    <td>{{ $fazenda->nome }}</td>
    <td>{{ $fazenda->tamanho_hectares }}</td>
    <td>{{ $fazenda->responsavel }}</td>

    <td>
        <a href="{{ route('fazendas.edit',$fazenda->id) }}">Editar</a>

        <form action="{{ route('fazendas.destroy',$fazenda->id) }}"
              method="POST"
              style="display:inline">
            @csrf
            @method('DELETE')
            <button>Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $fazendas->links() }}
