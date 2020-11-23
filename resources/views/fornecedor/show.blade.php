@extends('layout')
@section('header')
Fornecedor
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
Nome: {{$fornecedor->nome}}<br>
Morada: {{$fornecedor->morada}}<br>
Telefone: {{$fornecedor->telefone}}<br>
ID: {{$fornecedor->id_fornecedor}}<br>
ID Produtos:
@foreach($fornecedor->produtos as $produto)
<a href="{{route('produto.show',['id'=>$produto->id_produto])}}">
{{$produto->id_produto}}
</a>
@endforeach
</div>
@endsection