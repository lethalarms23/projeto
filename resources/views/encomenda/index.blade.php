@extends('layout')
@section('header')
Encomenda
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
@foreach($encomenda as $encomendas)
<tr><td>
<a href="{{route('encomenda.show',['id'=>$encomendas->id_encomenda])}}"><b>{{$encomendas->id_encomenda}}</b></a><br>
</tr></td>
@endforeach
</table>
@endsection
