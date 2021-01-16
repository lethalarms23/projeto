@extends('layout')
@section('header')
Editar Produto
@endsection
@section('conteudo')
<form action="{{route('produto.update',['id'=>$produto->id_produto])}}" method="post" enctype="multipart/form-data">
@method('patch')
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Designacao</th>
<td><input type="text" name="designacao" value="{{$produto->designacao}}"></td>
</tr>
<tr>
<th>Stock</th>
<td><input type="text" name="stock" value="{{$produto->stock}}"></td>
</tr>
<tr>
<th>Preco</th>
<td><input type="text" name="preco" value="{{$produto->preco}}"></td>
</tr>
<tr>
<th>Imagem</th>
<td><input type="file" name="imagem" value="{{$produto->imagem}}"></td>
</tr>
<tr>
<th>Categoria</th>
<td>
<select name="id_categoria" class="custom-select custom-select-sm" style="width: 25%">
@foreach($categoria as $categorias)
    <option value="{{$categorias->id_categoria}}" @if($categorias->id_categoria == $categoriaSel->id_categoria)selected @endif>{{$categorias->designacao}}</option>
@endforeach
</select>
</td>
<tr>
<th>Observacoes</th>
<td><input type="text" name="observacoes" value="{{$produto->observacoes}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
