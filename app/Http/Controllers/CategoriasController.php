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
            'nome' =>['required','min:1','max:50'],
            'morada' =>['nullable','min:1','max:100'],
            'id_categoria' => ['nullable','numeric','min:1'],
            'telefone' => ['nullable','numeric','min:1'],
            'observacoes' =>['nullable','min:1','max:255'],
        ]);
        $categoria = Categoria::create($novaCategoria);
        return redirect()->route('categoria.show',['id'=>$categoria->id_categoria]);
    }

    public function delete(Request $r){
        $fornecedor = Fornecedor::where('id_fornecedor',$r->id)->first();
        return view('fornecedor.delete',['fornecedor'=>$fornecedor]);
    }

    public function destroy(Request $r){
        $fornecedor = Fornecedor::where('id_fornecedor',$r->id)->first();
        $fornecedor->delete();
        return redirect()->route('fornecedor.index');
    }

    public function edit(Request $r){
        $fornecedor = Fornecedor::where('id_fornecedor',$r->id)->first();
        return view('fornecedor.edit',['fornecedor'=>$fornecedor]);
    }

    public function update(Request $r){
        $fornecedor = Fornecedor::where('id_fornecedor',$r->id)->first();
        $editarFornecedor = $r->validate([
            'nome' =>['required','min:1','max:50'],
            'morada' =>['nullable','min:1','max:100'],
            'id_categoria' => ['nullable','numeric','min:1'],
            'telefone' => ['nullable','numeric','min:1'],
            'observacoes' =>['nullable','min:1','max:255'],
        ]);
        $fornecedorUpdated = $fornecedor->update($editarFornecedor);
        return redirect()->route('fornecedor.show',['id'=>$fornecedor->id_fornecedor]);
    }
}
