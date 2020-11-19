@extends('layout')
@section('header')
Vendedor
@endsection
@section('conteudo')
<div class="container" style="text-align: center;">
ID: {{$vendedor->id_vendedor}}<br>
Nome: {{$vendedor->nome}}<br>
Especialidade: {{$vendedor->especialidade}}<br>
Email: {{$vendedor->email}}<br>
</div>
@endsection