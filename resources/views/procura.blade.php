@extends('layout')
@section('header')
Procura
@endsection
@section('conteudo')
<form method="post" action="{{route('pesquisa.show')}}" style="padding-left: 10px;">
    @csrf
<div class="input-group input-group-sm mb-3">
<div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm" for="pesquisainput"><b>Pesquisa:</b></span>
</div>
<input type="text" name="pesquisainput" class="form-controls" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
<button type="submit" class="btn btn-light">Submeter</button>
</div>
</form>
@endsection