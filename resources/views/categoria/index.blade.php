@extends('layout')
@section('header')
Categoria
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
@foreach($categoria as $categorias)
<tr><td>
<a href="{{route('categoria.show',['id'=>$categorias->id_categoria])}}"><b>{{$categorias->designacao}}</b></a><br>
</tr></td>
@endforeach
</table>
@endsection
