@extends('layout')
@section('header')
Eliminar Categoria
@endsection
@section('conteudo')
<form action="{{route('categoria.destroy',['id'=>$categoria->id_categoria])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$categoria->id_categoria}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Categoriar</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
