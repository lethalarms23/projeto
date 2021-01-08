@extends('layout')
@section('header')
Vendedor
@endsection
@section('conteudo')
<div class="container" style="background-color: #787878; text-align: center;width: min-content;">
@foreach($vendedor as $vendedores)
<a href="{{route('vendedor.show',['id'=>$vendedores->id_vendedor])}}"><b>{{$vendedores->nome}}</b></a><br>
@endforeach
</div>
<a href="{{route('vendedor.create')}}" class="btn btn-secondary" role="button">Adicionar</a>
@endsection