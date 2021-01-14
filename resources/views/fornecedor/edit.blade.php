@extends('layout')
@section('header')
Editar Fornecedor
@endsection
@section('conteudo')
<form action="{{route('fornecedor.update',['id'=>$fornecedor->id_fornecedor])}}" method="post">
@method('patch')
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{$fornecedor->nome}}"></td>
</tr>
<tr>
<th>Morada</th>
<td><input type="text" name="morada" value="{{$fornecedor->morada}}"></td>
</tr>
<tr>
<th>Telefone</th>
<td><input type="text" name="telefone" value="{{$fornecedor->telefone}}"></td>
</tr>
<tr>
<th>Observacoes</th>
<td><input type="text" name="observacoes" value="{{$fornecedor->observacoes}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
