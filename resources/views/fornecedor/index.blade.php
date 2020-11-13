@extends('layout')
@section('header')
Fornecedor
@endsection
@section('conteudo')
<div class="container" style="background-color: #787878; text-align: center;width: min-content;">
@foreach($fornecedor as $fornecedores)
<a href="{{route('fornecedor.show',['id'=>$fornecedores->id_fornecedor])}}"><b>{{$fornecedores->nome}}</b></a><br>
@endforeach
</div>
@endsection