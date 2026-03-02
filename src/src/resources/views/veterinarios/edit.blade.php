<h1>Editar Veterinário</h1>

<form action="{{ route('veterinarios.update', $veterinario->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $veterinario->nome }}">
    <br><br>

    <label>CRMV:</label>
    <input type="text" name="crmv" value="{{ $veterinario->crmv }}">
    <br><br>

    <button type="submit">Atualizar</button>
</form>