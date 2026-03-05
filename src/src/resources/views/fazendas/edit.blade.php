<form action="{{ route('fazendas.update',$fazenda->id) }}" method="POST">

@csrf
@method('PUT')

<h3>Nome da Fazenda: </h3>
<input type="text"
       name="nome"
       value="{{ $fazenda->nome }}">
       <br><br>
<h3>Tamanho (Hectares):</h3>
<input type="number"
       step="0.01"
       name="tamanho"
       value="{{ $fazenda->tamanho }}">

<br><br>
<h3>Responsável</h3>
<input type="text"
       name="responsavel"
       value="{{ $fazenda->responsavel }}">
<br><br>

<h3>Veterinários</h3>

<a href="{{ route('veterinarios.create') }}">
    + Novo Veterinário
</a>

<br><br>

<select name="veterinarios[]" multiple size="5">

@foreach($veterinarios as $vet)

<option value="{{ $vet->crmv }}"
    {{ $fazenda->veterinarios
        ->contains('crmv', $vet->crmv)
        ? 'selected'
        : '' }}>

    {{ $vet->nome }} - CRMV {{ $vet->crmv }}

</option>

@endforeach

</select>

<br><br>

<button type="submit">Atualizar</button>

</form>