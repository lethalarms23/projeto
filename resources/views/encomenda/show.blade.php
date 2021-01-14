@extends('layout')
@section('header')
Encomenda
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID Produto: {{$encomenda->id_produto}}<br>
Produtos:<br>
@foreach($encomenda->produtos as $produto)
    <a href="{{route('produto.show',['id'=>$produto->id_produto])}}">{{$produto->designacao}}</a><br>
@endforeach
</div>
@endsection