@extends('layout')
@section('titulo-pagina')
Adicionar Vendedor
@endsection
@section('conteudo')
<form action="{{route('vendedor.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{old('nome')}}">*</td>
</tr>
<tr>
<th>Especialidade</th>
<td><input type="text" name="especialidade" value="{{old('especialidade')}}">*</td>
</tr>
<tr>
<th>Email</th>
<td><input type="text" name="email" value="{{old('email')}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection