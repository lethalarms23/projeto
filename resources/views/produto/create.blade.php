@extends('layout')
@section('titulo-pagina')
Adicionar Produto
@endsection
@section('conteudo')
<form action="{{route('produto.store')}}" method="post" enctype="multipart/form-data">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Designacao</th>
<td><input type="text" name="designacao" value="{{old('designacao')}}">*</td>
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
<th>Imagem</th>
<td><input type="file" name="imagem" value="{{old('imagem')}}"></td>
</tr>
<tr>
<th>Observacoes</th>
<td><input type="text" name="observacoes" value="{{old('observacoes')}}"></td>
</tr>
<tr>
<th>Categoria</th>
<td>
<select name="id_categoria" class="custom-select custom-select-sm" style="width: 25%">
@foreach($categoria as $categorias)
    <option value="{{$categorias->id_categoria}}">{{$categorias->designacao}}</option>
@endforeach
</select>
</td>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('designacao'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Incorreta Designacao</td>
    </tr>
    </table>
@endif
@if($errors->has('stock'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Stock Incorreto</td>
    </tr>
    </table>
@endif
@if($errors->has('preco'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Preco incorreto</td>
    </tr>
    </table>
@endif
@if($errors->has('id_categoria'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Categoria Incorreta</td>
    </tr>
    </table>
@endif
@if($errors->has('observacoes'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Obersavações Incorreta</td>
    </tr>
    </table>
@endif
@if($errors->has('imagem'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Imagem Incorreta</td>
    </tr>
    </table>
@endif
@endsection
