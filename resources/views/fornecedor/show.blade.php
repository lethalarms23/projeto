@extends('layout')
@section('header')
Fornecedor
@endsection
@section('conteudo')
@if(isset($fornecedor))
<div class="container" style="text-align: center;">
Nome: {{$fornecedor->nome}}<br>
Morada: {{$fornecedor->morada}}<br>
Telefone: {{$fornecedor->telefone}}<br>
ID: {{$fornecedor->id_fornecedor}}<br>
@if(isset($fornecedor->produtos))
Produtos:
@foreach($fornecedor->produtos as $produto)
<br>
<a href="{{route('produto.show',['id'=>$produto->id_produto])}}">{{$produto->designacao}}</a>
@endforeach
@endif
@else
<table class="table table-dark table-striped">
    <tr>
        <td class="alert alert-danger">Fornecedor não encontrado</td>
    </tr>
</table>
@endif
</div>
@if(Gate::allows('admin'))
<a href="{{route('fornecedor.edit',['id'=>$fornecedor->id_fornecedor])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('fornecedor.delete',['id'=>$fornecedor->id_fornecedor])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endif
@endsection
