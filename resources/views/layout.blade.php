<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag.min.css')}}">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/mdb.js')}}"></script>
    <style>
    body{
        background-color: #2b2b2b;
        color: #ffffff;
    }
    a{
        color: #ffffff;
    }
    </style>
</head>
<body>
    <h2 style="text-align: center" class="bg-dark">@yield('header')</h2>
    @yield('conteudo')
    <nav class="navbar navbar-expand-lg navbar bg-dark">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('home.index')}}"><i class="fas fa-home"></i></a>
      <a class="nav-item nav-link" href="{{route('procura.index')}}"><i class="fas fa-search"></i></a>
      <a class="nav-item nav-link" href="{{route('categoria.index')}}">Categorias</a>
      <a class="nav-item nav-link" href="{{route('encomenda.index')}}">Encomendas</a>
      <a class="nav-item nav-link" href="{{route('fornecedor.index')}}">Fornecedores</a>
      <a class="nav-item nav-link" href="{{route('produto.index')}}">Produtos</a>
      <a class="nav-item nav-link" href="{{route('vendedor.index')}}">Vendedores</a>
    </div>
  </div>
</nav>
</body>
</html>