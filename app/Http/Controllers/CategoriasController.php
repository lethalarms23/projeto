<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('categoria.index',['categoria'=>$categorias]);
    }

    public function show(Request $r){
       $idCategoria = $r->id;
       $categorias = Categoria::where('id_categoria',$idCategoria)->with(['produtos'])->first();
       return view('categoria.show',['categoria'=>$categorias]);
    }
}
