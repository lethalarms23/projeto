@extends('layout')
@section('titulo-pagina')
Adicionar Categoria
@endsection
@section('conteudo')
<form action="{{route('categoria.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>designacao</th>
<td><input type="text" name="designacao" value="{{old('designacao')}}">*</td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('designacao'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Designacao incorreto</td>
    </tr>
    </table>
@endif
@endsection
