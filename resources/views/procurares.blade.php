@extends('layout')
@section('header')
Resultado para: "{{$texto}}"
@endsection
@section('conteudo')
<div class="container">
<div class="floatLeft">
<table class="table table-dark table-striped">
  <tbody>
    <tr>
    <td>
    @if(count($resultado1)>0)
    @else
    <div class="alert alert-danger" role="alert">
    Nenhum resultado para categorias.
    </div>
    @endif
    </td>
    </tr>
    <tr>
    <td>
    @if(count($resultado2)>0)
    @else
    <div class="alert alert-danger" role="alert">
    Nenhum resultado para fornecedores.
    </div>
    @endif
    </td>
    </tr>
    <tr>
    <td>
    @if(count($resultado3)>0)
    @else
    <div class="alert alert-danger" role="alert">
    Nenhum resultado para produtos.
    </div>
    @endif
    </td>
    </tr>
    <tr>
    <td>
    @if(count($resultado4)>0)
    @else
    <div class="alert alert-danger" role="alert">
    Nenhum resultado para vendedores.
    </div>
    @endif
    </td>
    </tr>
  </tbody>
</table>
</div>


<div class="container">
<div class="floatLeft">
<table class="table table-dark table-striped">
  <tbody>
  @if(count($resultado1)>0)
  <thead>
    <tr>
      <th scope="col">Categorias</th>
    </tr>
  </thead>
    @foreach($resultado1 as $res1)
    <tr>
    <td>
    <a href="{{route('categoria.show',['id'=>$res1->id_categoria])}}">{{$res1->designacao}}</a>
    </td>
    </tr>
    @endforeach
@endif
  </tbody>
</table>
</div>
<div class="floatRight">
<table class="table table-dark table-striped">
  <tbody>
  @if(count($resultado2)>0)
  <thead>
    <tr>
      <th scope="col">Fornecedor</th>
    </tr>
  </thead>
    @foreach($resultado2 as $res2)
    <tr>
    <td>
    <a href="{{route('fornecedor.show',['id'=>$res2->id_fornecedor])}}">{{$res2->nome}}</a>
    </td>
    </tr>
    @endforeach
@endif
  </tbody>
</table>
</div>

<div class="floatLeft">
<table class="table table-dark table-striped">
  <tbody>
  @if(count($resultado3)>0)
  <thead>
    <tr>
      <th scope="col">Produto</th>
    </tr>
  </thead>
    @foreach($resultado3 as $res3)
    <tr>
    <td>
    <a href="{{route('produto.show',['id'=>$res3->id_produto])}}">{{$res3->designacao}}</a>
    </td>
    </tr>
    @endforeach
@endif
  </tbody>
</table>
</div>

<div class="floatRight">
<table class="table table-dark table-striped">
  <tbody>
  @if(count($resultado4)>0)
  <thead>
    <tr>
      <th scope="col">Vendedor</th>
    </tr>
  </thead>
    @foreach($resultado4 as $res4)
    <tr>
    <td>
    <a href="{{route('vendedor.show',['id'=>$res4->id_vendedor])}}">{{$res4->nome}}</a><br>
    </td>
    </tr>
    @endforeach
@endif
  </tbody>
</table>
</div>
</div>
@endsection