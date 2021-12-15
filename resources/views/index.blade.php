@extends('layouts.index')
@section('meta')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="main-container">
        <h1>Lista de contatos</h1>
        <h2>Aqui poderá ver a lista de todos os usuários cadastrados no banco de dados</h2>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Telefone</td>
                    <td>Email</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                @foreach ($contacts as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->contact }}</td>
                        <td>{{ $c->email }}</td>
                        <td class="btn-td">
                        <form action="{{ route('contact.edit',$c->id) }}">
                            @csrf
                            <button type="submit" class="edit-btn">Editar</button>
                        </form></td>
                        <td class="btn-td"><button class="del-btn">X</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
