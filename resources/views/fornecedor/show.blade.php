@extends('layout')
@section('header')
Fornecedors
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
Nome: {{$categoria->designacao}}<br>
ID: {{$categoria->id_categoria}}<br>
</div>
@endsection