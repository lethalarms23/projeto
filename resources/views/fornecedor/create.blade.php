@extends('layout')
@section('titulo-pagina')
Adicionar Fornecedor
@endsection
@section('conteudo')
<form action="{{route('fornecedor.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{old('nome')}}">*</td>
</tr>
<tr>
<th>Morada</th>
<td><input type="text" name="morada" value="{{old('morada')}}">*</td>
</tr>
<tr>
<th>Telefone</th>
<td><input type="text" name="telefone" value="{{old('telefone')}}"></td>
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
@if($errors->has('nome'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Nome Incorreto</td>
    </tr>
    </table>
@endif
@if($errors->has('morada'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Morada Incorreta</td>
    </tr>
    </table>
@endif
@if($errors->has('telefone'))
<table class="table table-dark table-striped">
    <tr>
    <td class="alert alert-danger">Telefone incorreto</td>
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
@endsection
