@extends('layout')
@section('header')
Encomenda
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID Produto: {{$encomenda->id_produto}}<br>
@foreach($encomenda->produtos as $produto)
    Nome Produto: {{$produto->nome}}
@endforeach
</div>
@endsection