<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if(Gate::allows('admin')){
            return view('categoria.create');
        }
        else{
            return redirect()->route('categoria.index')->with('msg','Não têm permissão');
        }
    }

    public function store(Request $r){
        if(Gate::allows('admin')){
            $novaCategoria = $r->validate([
                'id_categoria' =>['nullable'],
                'designacao' =>['required'],
            ]);
            $categoria = Categoria::create($novaCategoria);
            return redirect()->route('categoria.show',['id'=>$categoria->id_categoria]);
        }
        else{
            return redirect()->route('categoria.index')->with('msg','Não têm permissão');
        }
    }

    public function delete(Request $r){
        if(Gate::allows('admin')){
            $categoria = Categoria::where('id_categoria',$r->id)->first();
            return view('categoria.delete',['categoria'=>$categoria]);
        }
        else{
            return redirect()->route('categoria.index')->with('msg','Não têm permissão');
        }
    }

    public function destroy(Request $r){
        if(Gate::allows('admin')){
            $categoria = Categoria::where('id_categoria',$r->id)->first();
            $categoria->delete();
            return redirect()->route('categoria.index');
        }
        else{
            return redirect()->route('categoria.index')->with('msg','Não têm permissão');
        }
    }

    public function edit(Request $r){
        if(Gate::allows('admin')){
            $categoria = Categoria::where('id_categoria',$r->id)->first();
            return view('categoria.edit',['categoria'=>$categoria]);
        }
        else{
            return redirect()->route('categoria.index')->with('msg','Não têm permissão');
        }
    }

    public function update(Request $r){
        if(Gate::allows('admin')){
            $categoria = Categoria::where('id_categoria',$r->id)->first();
            $editarCategoria = $r->validate([
                'id_categoria' =>['nullable'],
                'designacao' =>['required'],
            ]);
            $categoriaUpdated = $categoria->update($editarCategoria);
            return redirect()->route('categoria.show',['id'=>$categoria->id_categoria]);
        }
        else{
            return redirect()->route('categoria.index')->with('msg','Não têm permissão');
        }
    }
}
