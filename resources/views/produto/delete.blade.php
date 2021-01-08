@extends('layout')
@section('header')
Eliminar Produto
@endsection
@section('conteudo')
<form action="{{route('produto.destroy',['id'=>$produto->id_produto])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$produto->id_produto}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Produto</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
