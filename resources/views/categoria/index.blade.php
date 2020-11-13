@extends('layout')
@section('header')
Categoria
@endsection
@section('conteudo')
<div class="container" style="background-color: #787878; text-align: center;width: min-content;">
@foreach($categoria as $categorias)
<a href="{{route('categoria.show',['id'=>$categorias->id_categoria])}}"><b>{{$categorias->designacao}}</b></a><br>
@endforeach
</div>
@endsection