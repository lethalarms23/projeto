@extends('layout')
@section('header')
Produto
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID: {{$produto->id_produto}}<br>
ID Categoria: {{$produto->id_categoria}}<br>
@if(isset($categoria->designacao))
Nome Categoria:
<a href="{{route('categoria.show',['id'=>$categoria->id_categoria])}}">{{$categoria->designacao}}</a><br>
@else
Categoria Inexistente <br>
@endif
Nome: {{$produto->designacao}}<br>
Stock: {{$produto->stock}}<br>
Preço: {{$produto->preco}}<br>
Observacoes: {{$produto->observacoes}}<br>
Imagem: @if(isset($produto->imagem))<img src="{{asset('imagems/produtos/'.$produto->imagem)}}" style="width:10%">@endif<br>
Nº de Likes: {{$likes}}
    @if($utilizador != null)
    <a href="{{route('produto.unlike',['id'=>$produto->id_produto])}}">
        <i class="fas fa-heart" style="color: blue"></i>
    </a>
    @else
    <a href="{{route('produto.like',['id'=>$produto->id_produto])}}">
        <i class="fas fa-heart"></i>
    </a>
    @endif
</div>
@if(Gate::allows('admin'))
<a href="{{route('produto.edit',['id'=>$produto->id_produto])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('produto.delete',['id'=>$produto->id_produto])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endif
@endsection
