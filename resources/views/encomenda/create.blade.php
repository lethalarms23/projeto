@extends('layout')
@section('titulo-pagina')
Adicionar Fornecedor
@endsection
@section('conteudo')
<form action="{{route('encomenda.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Produto</th>
<td>
<select name="id_produto[]" class="custom-select custom-select-sm" style="width: 25%">
@foreach($produto as $produtos)
    <option value="{{$produtos->id_produto}}">{{$produtos->designacao}}</option>
@endforeach
</select>
</td>
</tr>
<tr>
<th>Quantidade</th>
<td><input type="text" name="quantidade" value="{{old('quantidade')}}">*</td>
</tr>
<tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
