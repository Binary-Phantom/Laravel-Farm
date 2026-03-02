@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif


<h1>Veterinários</h1>

<a href="{{ route('veterinarios.create') }}">
    Novo Veterinário
</a>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>CRMV</th>
    </tr>

    @foreach($veterinarios as $veterinario)
        <tr>
            <td>{{ $veterinario->nome }}</td>
            <td>{{ $veterinario->crmv }}</td>
            <th>Ações</th>
            <td>
                <a href="{{ route('veterinarios.edit', $veterinario->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                </a>

                    <form action="{{ route('veterinarios.destroy', $veterinario->id) }}"
                        method="POST"
                        style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Excluir
                        </button>
                    </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $veterinarios->links() }}