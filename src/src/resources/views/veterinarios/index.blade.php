<h1>Lista de Veterinários</h1>

<a href="{{ route('veterinarios.create') }}">Novo Veterinário</a>

<table border="1">
    <tr>
        <th>CRMV</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>

    @foreach($veterinarios as $veterinario)
    <tr>
        <td>{{ $veterinario->crmv }}</td>
        <td>{{ $veterinario->nome }}</td>
        <td>
            <a href="{{ route('veterinarios.edit', $veterinario->crmv) }}">
                <button type="button">Editar</button>
            </a>

            <form action="{{ route('veterinarios.destroy', $veterinario->crmv) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE') <!-- essencial para que Laravel reconheça como DELETE -->
    <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
    </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $veterinarios->links() }}