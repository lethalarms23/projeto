<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Vendedor;

class IndexController extends Controller
{
    public function Index(){
        $text = '';
        $res1 = Categoria::paginate(4);
        $res2 = Fornecedor::paginate(4);
        $res3 = Produto::paginate(4);
        $res4 = Vendedor::paginate(4);
        return view('index', ['texto'=>$text, 'resultado1'=>$res1, 'resultado2'=>$res2,'resultado3'=>$res3,'resultado4'=>$res4]);
    }
}
