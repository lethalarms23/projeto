@extends('layout')
@section('titulo-pagina')
Adicionar Produto
@endsection
@section('conteudo')
<form action="{{route('produto.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Designacao</th>
<td><input type="text" name="nome" value="{{old('designacao')}}">*</td>
</tr>
<tr>
<th>Stock</th>
<td><input type="text" name="stock" value="{{old('stock')}}">*</td>
</tr>
<tr>
<th>Preco</th>
<td><input type="text" name="preco" value="{{old('preco')}}"></td>
</tr>
<tr>
<th>Observacoes</th>
<td><input type="text" name="observacoes" value="{{old('observacoes')}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection