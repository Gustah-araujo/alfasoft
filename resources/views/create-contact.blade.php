@extends('layouts.index')
@section('meta')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="main-container">
        <h1>Criar contato</h1>
        <h2>Criar e armazenar um novo contato no banco de dados</h2>

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <input type="text" id="name" name="name" placeholder="Nome">
            @error('name')
                <h3>{{ '*' . $message }}</h3>
            @enderror

            <input type="text" id="contact" name="contact" placeholder="Telefone">
            @error('contact')
                <h3>{{ '*' . $message }}</h3>
            @enderror

            <input type="text" id="email" name="email" placeholder="Email">
            @error('email')
                <h3>{{ '*' . $message }}</h3>
            @enderror

            <button type="submit">Salvar</button>
        </form>
    </div>
@endsection
