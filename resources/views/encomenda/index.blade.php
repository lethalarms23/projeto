@extends('layout')
@section('header')
Encomenda
@endsection
@section('conteudo')
<div class="container" style="background-color: #787878; text-align: center;width: min-content;">
@foreach($encomenda as $encomendas)
<a href="{{route('encomenda.show',['id'=>$encomendas->id_encomenda])}}"><b>{{$encomendas->id_encomenda}}</b></a><br>
@endforeach
</div>
@endsection