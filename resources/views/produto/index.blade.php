@extends('layout')
@section('header')
Produto
@endsection
@section('conteudo')
<div class="container" style="background-color: #787878; text-align: center;width: min-content;">
@foreach($produto as $produtos)
<a href="{{route('produto.show',['id'=>$produto->id_produto])}}"><b>{{$produtos->designacao}}</b></a><br>
@endforeach
</div>
@endsection