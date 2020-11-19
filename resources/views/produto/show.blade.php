@extends('layout')
@section('header')
Fornecedor
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID: {{$produto->id_produto}}<br>
ID Categoria: {{$produto->id_categoria}}<br>
Nome: {{$produto->designacao}}<br>
Stock: {{$produto->preco}}<br>
Preço: {{$produto->preco}}<br>
</div>
@endsection