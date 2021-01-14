@extends('layout')
@section('header')
Eliminar Fornecedor
@endsection
@section('conteudo')
<form action="{{route('fornecedor.destroy',['id'=>$fornecedor->id_fornecedor])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$fornecedor->id_fornecedor}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Fornecedor</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
