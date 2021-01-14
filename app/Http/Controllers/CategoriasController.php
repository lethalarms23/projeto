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

    public function create(){
        return view('categoria.create');
    }

    public function store(Request $r){
        $novaCategoria = $r->validate([
            'id_categoria' =>['nullable'],
            'designacao' =>['required'],
        ]);
        $categoria = Categoria::create($novaCategoria);
        return redirect()->route('categoria.show',['id'=>$categoria->id_categoria]);
    }

    public function delete(Request $r){
        $categoria = Categoria::where('id_categoria',$r->id)->first();
        return view('categoria.delete',['categoria'=>$categoria]);
    }

    public function destroy(Request $r){
        $categoria = Categoria::where('id_categoria',$r->id)->first();
        $categoria->delete();
        return redirect()->route('categoria.index');
    }

    public function edit(Request $r){
        $categoria = Categoria::where('id_categoria',$r->id)->first();
        return view('categoria.edit',['categoria'=>$categoria]);
    }

    public function update(Request $r){
        $categoria = Categoria::where('id_categoria',$r->id)->first();
        $editarCategoria = $r->validate([
            'id_categoria' =>['nullable'],
            'designacao' =>['required'],
        ]);
        $categoriaUpdated = $categoria->update($editarCategoria);
        return redirect()->route('categoria.show',['id'=>$categoria->id_categoria]);
    }
}
