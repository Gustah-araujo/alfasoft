@extends('layouts.auth')

@section('meta')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <input type="text" name="email" placeholder="Email">
            @error('email')
                <h3>{{ $message }}</h3>
            @enderror

            <input type="password" name="password" placeholder="Senha">
            @error('password')
                <h3>{{ $message }}</h3>
            @enderror

            <button type="submit">Logar</button>
        </form>
    </div>
@endsection
