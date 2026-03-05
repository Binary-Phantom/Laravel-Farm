<form action="{{ route('fazendas.store') }}" method="POST">
@csrf

<label>Nome:</label>
<input type="text" name="nome" required>

<br><br>

<label>Tamanho (hectares):</label>
<input type="number" step="0.01" name="tamanho" required>

<br><br>

<label>Responsável pela Fazenda:</label>
<input type="text" name="responsavel" required>

<br><br>

<h3>Veterinários Vinculados</h3>

<select name="veterinarios[]" multiple size="5" required>
@foreach($veterinarios as $vet)
    <option value="{{ $vet->crmv }}">
        {{ $vet->nome }} - CRMV {{ $vet->crmv }}
    </option>
@endforeach
</select>

<br><br>

<button type="submit">Salvar</button>

</form>