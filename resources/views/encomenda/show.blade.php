@extends('layout')
@section('header')
Categoria
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID Produto: {{$encomenda->id_produto}}<br>
ID: {{$encomenda->id_categoria}}<br>
</div>
@endsection