@extends('layout')
@section('header')
Produto
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
@foreach($produto as $produtos)
<tr>
<td><a href="{{route('produto.show',['id'=>$produtos->id_produto])}}"><b>{{$produtos->designacao}}</b></a></td>
</tr>
@endforeach
</table>
<a href="{{route('produto.create')}}" class="btn btn-secondary" role="button">Adicionar</a>
@endsection
