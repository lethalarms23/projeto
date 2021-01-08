@extends('layout')
@section('header')
Eliminar Vendedor
@endsection
@section('conteudo')
<form action="{{route('vendedor.destroy',['id'=>$vendedor->id_vendedor])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$vendedor->id_vendedor}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Vendedor</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
