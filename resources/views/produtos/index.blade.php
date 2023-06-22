{{-- resources/views/produtos/index.blade.php --}}
@extends('includes.base')

@section('title', 'Produtos')

@section('content')

@if (session('sucesso'))
    <div style="background-color:greenyellow;color:rebeccapurple;">
        <marquee>
        🎆 {{ session('sucesso') }}
        </marquee>
    </div>
@endif

<form action="{{ route('produtos') }}" method="post">
    @csrf
    <input type="text" name="busca">
    <select name="ord" id="">
        <option value="asc">Crescente</option>
        <option value="desc">Decrescente</option>
    </select>
    <input type="submit" value="Buscar">
</form>
<br>

<table border="1" style="border-color:rgb(52, 214, 87)">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Editar</th>
        <th>Apagar</th>
    </tr>

    @foreach ($prods as $prod)
    <tr>
        <td><a href="{{ route('produtos.view', $prod->id) }}">{{ $prod->name }}</a></td>
        <td>R$ {{ number_format($prod->price, 2, ',', '.') }}</td>
        <td>{{ $prod->quantity }}</td>
        <td><a href="{{ route('produtos.edit', $prod->id) }}">Editar</a></td>
        <td><a href="{{ route('produtos.delete', $prod->id) }}">Apagar</a></td>
    </tr>
    @endforeach

</table>

<a href="{{ route('produtos.add') }}">Adicionar produto</a>
@endsection
