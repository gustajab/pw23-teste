{{-- views/usuarios/add.blade.php --}}
@extends('includes.base')

@section('title', 'Usuários - Adicionar')

@section('content')
    <h2>Adicione seu usuário</h2>

    @if ($errors)
        @foreach ($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    @endif

    <form action="{{ url()->current() }}" method="post">

        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{ old('name', $usr->name ?? '') }}">
        <br>
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email', $usr->email ?? '') }}">
        <br>
        <input type="password" name="password" placeholder="Senha" value="">
        <br><br>
        <input type="submit" value="Gravar">
    </form>
@endsection
