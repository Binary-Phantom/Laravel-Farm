
<h1>Editar Veterinário</h1>

<form action="{{ route('veterinarios.update', $veterinario->crmv) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $veterinario->nome) }}">
    <br><br>

    <label>CRMV:</label>
    <input type="text" name="crmv" value="{{ old('crmv', $veterinario->crmv) }}">
    <br><br>

    <button type="submit">Atualizar</button>
</form>

<a href="{{ route('veterinarios.index') }}">Voltar para a lista</a>