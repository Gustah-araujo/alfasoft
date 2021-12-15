@extends('layouts.index')

@section('meta')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')

    <div class="main-container">
        <h1>Editar contato</h1>
        <h2>Alterar informações de algum contato no banco de dados</h2>

        <form method="POST" action="{{ route('contact.update', $contact->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="new_name" id="new_name" value="{{ $contact->name }}">
            @error('new_name')
                <h3>{{ '*' . $message }}</h3>
            @enderror

            <input type="text" name="new_contact" id="new_contact" value="{{ $contact->contact }}">
            @error('new_contact')
                <h3>{{ '*' . $message }}</h3>
            @enderror

            <input type="text" name="new_email" id="new_email" value="{{ $contact->email }}">
            @error('new_email')
                <h3>{{ '*' . $message }}</h3>
            @enderror


            <button type="submit">Salvar</button>
        </form>
    </div>

@endsection
