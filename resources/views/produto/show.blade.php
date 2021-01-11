@extends('layout')
@section('header')
Produto
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID: {{$produto->id_produto}}<br>
ID Categoria: {{$produto->id_categoria}}<br>
Nome Categoria: {{$categoria->designacao}}<br>
Nome: {{$produto->designacao}}<br>
Stock: {{$produto->stock}}<br>
Preço: {{$produto->preco}}<br>
Observacoes: {{$produto->observacoes}}<br>
</div>
<a href="{{route('produto.edit',['id'=>$produto->id_produto])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('produto.delete',['id'=>$produto->id_produto])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endsection
