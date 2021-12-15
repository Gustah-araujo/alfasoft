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
                            <form action="{{ route('contact.edit', $c->id) }}">
                                @csrf
                                <button type="submit" class="edit-btn">Editar</button>
                            </form>
                        </td>
                        <td class="btn-td">

                            <button type="button" class="del-btn" data-bs-toggle="modal"
                                data-bs-target="{{ '#deleteModal-' . $c->id }}">
                                X
                            </button>

                            <div class="modal fade" id="{{ 'deleteModal-' . $c->id }}" tabindex="-1" aria-labelledby="{{ 'deleteModal-' . $c->id . 'label' }}"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{ 'deleteModal-' . $c->id . 'label' }}">Deseja mesmo excluir o contato?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Por favor confirme se deseja excluir o contato: {{ $c->name }}
                                        </div>
                                        <form action="{{ route('contact.destroy', $c->id) }}" method="POST" class="modal-footer">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</a>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
