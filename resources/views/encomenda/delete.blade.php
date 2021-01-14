@extends('layout')
@section('header')
Eliminar Encomenda
@endsection
@section('conteudo')
<form action="{{route('encomenda.destroy',['id'=>$encomenda->id_encomenda])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$encomenda->id_encomenda}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Fornecedor</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
