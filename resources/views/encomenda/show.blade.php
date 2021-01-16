@extends('layout')
@section('header')
Encomenda
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID Produto: {{$encomenda->id_produto}}<br>
Produtos:<br>
@foreach($encomenda->produtos as $produto)
    <a href="{{route('produto.show',['id'=>$produto->id_produto])}}">{{$produto->designacao}}</a><br>
@endforeach
</div>
@if(Gate::allows('admin'))
<a href="{{route('encomenda.edit',['id'=>$encomenda->id_encomenda])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('encomenda.delete',['id'=>$encomenda->id_encomenda])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endif
@endsection