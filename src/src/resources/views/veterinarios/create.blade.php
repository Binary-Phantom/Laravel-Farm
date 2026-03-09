@extends('app.app')
@section('content')

<h1>Novo Veterinário</h1>

<form action="{{ route('veterinarios.store') }}" method="POST">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome">
    <br><br>

    <label>CRMV:</label>
    <input type="text" name="crmv">
    <br><br>

    <button type="submit">Salvar</button>
</form>
@endsection