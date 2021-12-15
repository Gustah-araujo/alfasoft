@extends('layouts.index')
@section('meta')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <div class="main-container">
        <h1>Detalhes do contato</h1>
        <h2>Veja detalhes sobre o contato selecionado</h2>

        <hr>

        <h2><b>ID:</b> {{ $contact->id }}</h2>
        <h2><b>Nome:</b> {{ $contact->name }}</h2>
        <h2><b>Telefone:</b> {{ $contact->contact }}</h2>
        <h2><b>Email:</b> {{ $contact->email }}</h2>
    </div>
@endsection
