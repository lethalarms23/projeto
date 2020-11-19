<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::paginate(4);
        return view('produto.index',['produto'=>$produtos]);
    }

    public function show(Request $r){
        $idProduto = $r->id;
        $produto = Produto::where('id_produto',$idProduto)->first();
        return view('produto.show',['produto'=>$produto]);
    }
}
