@extends('layout')
@section('header')
Resultado para: {{$texto}}
@endsection
@section('conteudo')
@if(count($resultado1)>0)
    <div style="text-align: center">
    <b>Resultados de Jogadores</b><br>
    </div>
    @foreach($resultado1 as $res1)
    <div style="text-align: center">
    <a href="{{route('jogadores.show',['id'=>$res1->id_jogador])}}">{{$res1->nome}}</a><br>
    </div>
    @endforeach
@else
    <div class="alert alert-danger" role="alert">
    Nenhum resultado para jogadores.
    </div>
@endif
@if(count($resultado2)>0)
    <div style="text-align: center">
    <b>Resultados de Equipas</b><br>
    </div>
    @foreach($resultado2 as $res2)
    <div style="text-align: center">
    <a href="{{route('equipas.show',['id'=>$res2->id_equipa])}}">{{$res2->designacao}}</a><br>
    </div>
    @endforeach
@else
    <div class="alert alert-danger" role="alert">
    Nenhum resultado para equipas.
    </div>
@endif
@endsection