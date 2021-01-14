@extends('layout')
@section('header')
Fornecedor
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
@foreach($fornecedor as $fornecedores)
<tr><td>
<a href="{{route('fornecedor.show',['id'=>$fornecedores->id_fornecedor])}}"><b>{{$fornecedores->nome}}</b></a><br>
</tr></td>
@endforeach
</table>
<a href="{{route('fornecedor.create')}}" class="btn btn-secondary" role="button">Adicionar</a>
@endsection
