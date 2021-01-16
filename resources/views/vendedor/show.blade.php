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
@if(Gate::allows('admin'))
<a href="{{route('vendedor.edit',['id'=>$vendedor->id_vendedor])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('vendedor.delete',['id'=>$vendedor->id_vendedor])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endif
@endsection