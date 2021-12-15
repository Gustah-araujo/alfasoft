@extends('layouts.auth')
@section('meta')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome">
            @error('name')
                <h3>{{ $message }}</h3>
            @enderror

            <input type="text" name="email" placeholder="Email">
            @error('email')
                <h3>{{ $message }}</h3>
            @enderror

            <input type="password" name="password" placeholder="Senha">
            @error('password')
                <h3>{{ $message }}</h3>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmar senha">
            @error('password-confirmation')
                <h3>{{ $message }}</h3>
            @enderror


            <button type="submit">Registrar</button>
        </form>
    </div>
@endsection
