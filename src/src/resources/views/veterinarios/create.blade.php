@extends('app.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Novo Veterinário</h1>

    <form action="{{ route('veterinarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome do veterinário" required>
        </div>

        <div class="mb-3">
            <label for="crmv" class="form-label">CRMV:</label>
            <input type="text" name="crmv" id="crmv" class="form-control" placeholder="Digite o CRMV" maxlength="5" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

@endsection