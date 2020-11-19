@extends('layout')
@section('header')
Fornecedor
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
Nome: {{$fornecedor->nome}}<br>
Morada: {{$fornecedor->morada}}<br>
Telefone: {{$fornecedor->telefone}}<br>
ID: {{$fornecedor->id_fornecedor}}<br>
</div>
@endsection