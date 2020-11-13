@extends('layout')
@section('header')
Procura
@endsection
@section('conteudo')
<form method="post" action="{{route('pesquisa.show')}}" style="padding-left: 10px;">
    @csrf
<label for="pesquisainput"><b>Pesquisa:</b></label>
<input type="text" name="pesquisainput" style="background-color: #b0b0b0">
<button type="submit">Submeter</button>
</form>
@endsection