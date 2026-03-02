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
        </tr>
    @endforeach
</table>

{{ $veterinarios->links() }}