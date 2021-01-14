@extends('layout')
@section('header')
Categoria
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
Nome: {{$categoria->designacao}}<br>
ID: {{$categoria->id_categoria}}<br>
</div>
<a href="{{route('categoria.edit',['id'=>$categoria->id_categoria])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('categoria.delete',['id'=>$categoria->id_categoria])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endsection