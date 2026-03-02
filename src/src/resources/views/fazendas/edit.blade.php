<form action="{{ route('fazendas.update',$fazenda->id) }}" method="POST">

@csrf
@method('PUT')

<input type="text" name="nome"
       value="{{ $fazenda->nome }}">

<input type="number"
       name="tamanho_hectares"
       value="{{ $fazenda->tamanho_hectares }}">

<input type="text"
       name="responsavel"
       value="{{ $fazenda->responsavel }}">

<h3>Veterinários</h3>

<a href="{{ route('veterinarios.create') }}">
    + Novo Veterinário
</a>

<br><br>

<select name="veterinarios[]" multiple size="5">

<button type="submit">Atualizar</button>

</form>