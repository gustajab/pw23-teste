{{-- resources/views/usuarios/index.blade.php --}}
@extends('includes.base')

@section('title', 'Usuários')

@section('content')

<table border="1" style="border-color:rgb(52, 214, 87)">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Editar</th>
        <th>Apagar</th>
    </tr>

    @foreach ($users as $usr)
    <tr>
        <td><a href="{{ route('usuarios.view', $usr->id) }}">{{ $usr->name }}</a></td>
        <td>{{ $usr->email }}</td>
        <td><a href="{{ route('usuarios.edit', $usr->id) }}">Editar</a></td>
        <td><a href="{{ route('usuarios.delete', $usr->id) }}">Apagar</a></td>
    </tr>
    @endforeach

</table>

<a href="{{ route('usuarios.add')}}">Adicionar</a>
@endsection
