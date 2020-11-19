<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Vendedor;


class ProcuraController extends Controller
{
    public function index(){
        return view('procura');
    }

    public function pesquisa(Request $r){
        
        $text = $r -> pesquisainput;
        $res1 = Categoria::where('designacao','LIKE','%'.$text.'%')->get();
        $res2 = Fornecedor::where('nome','LIKE','%'.$text.'%')->get();
        $res3 = Produto::where('designacao','LIKE','%'.$text.'%')->get();
        $res4 = Vendedor::where('nome','LIKE','%'.$text.'%')->get();
        return view('procurares', ['texto'=>$text, 'resultado1'=>$res1, 'resultado2'=>$res2,'resultado3'=>$res3,'resultado4'=>$res4]);
    }
}
