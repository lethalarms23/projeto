@extends('layout')
@section('header')
Vendedor
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
@foreach($vendedor as $vendedores)
<tr><td>
<a href="{{route('vendedor.show',['id'=>$vendedores->id_vendedor])}}"><b>{{$vendedores->nome}}</b></a><br>
</tr></td>
@endforeach
</table>
<a href="{{route('vendedor.create')}}" class="btn btn-secondary" role="button">Adicionar</a>
@endsection
