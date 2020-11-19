@extends('layout')
@section('header')
Página Inicial
@endsection
@section('conteudo')
<div class="container">
<div class="floatLeft">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Categorias</th>
    </tr>
  </thead>
  <tbody>
    @foreach($resultado1 as $res1)
    <tr>
    <td>
    <a href="{{route('categoria.show',['id'=>$res1->id_categoria])}}">{{$res1->designacao}}</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="floatRight">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Fornecedor</th>
    </tr>
  </thead>
  <tbody>
    @foreach($resultado2 as $res2)
    <tr>
    <td>
    <a href="{{route('fornecedor.show',['id'=>$res2->id_fornecedor])}}">{{$res2->nome}}</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div class="floatLeft">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Produto</th>
    </tr>
  </thead>
  <tbody>
    @foreach($resultado3 as $res3)
    <tr>
    <td>
    <a href="{{route('produto.show',['id'=>$res3->id_produto])}}">{{$res3->designacao}}</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div class="floatRight">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Vendedor</th>
    </tr>
  </thead>
  <tbody>
    @foreach($resultado4 as $res4)
    <tr>
    <td>
    <a href="{{route('vendedor.show',['id'=>$res4->id_vendedor])}}">{{$res4->nome}}</a><br>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<form method="post" action="{{route('pesquisa.show')}}" style="padding-left: 10px;">
@csrf
<button type="submit" class="btn btn-dark">+</button>
</form>
</div>
</div>
<br>
@endsection