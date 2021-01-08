@extends('layout')
@section('header')
Editar Vendedor
@endsection
@section('conteudo')
<form action="{{route('vendedor.update',['id'=>$vendedor->id_vendedor])}}" method="post">
@method('patch')
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{$vendedor->nome}}">*</td>
</tr>
<tr>
<th>Especialidade</th>
<td><input type="text" name="especialidade" value="{{$vendedor->especialidade}}">*</td>
</tr>
<tr>
<th>Email</th>
<td><input type="text" name="email" value="{{$vendedor->email}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
