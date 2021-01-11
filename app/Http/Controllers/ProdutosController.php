<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produto.index',['produto'=>$produtos]);
    }

    public function show(Request $r){
        $idProduto = $r->id;
        $produto = Produto::where('id_produto',$idProduto)->with('encomendas')->first();
        $categoria = Categoria::where('id_categoria',$produto->id_categoria)->with('produtos')->first();
        return view('produto.show',['produto'=>$produto,'categoria'=>$categoria]);
    }

    public function create(){
        return view('produto.create');
    }

    public function store(Request $r){
        $novoProduto = $r->validate([
            'id_produto' =>['nullable','numeric','min:1'],
            'designacao' =>['required','min:1','max:50'],
            'stock' => ['nullable','numeric','min:1'],
            'preco' => ['nullable','numeric','min:1'],
            'id_categoria' =>['nullable','numeric','min:1'],
            'observacoes' =>['nullable','min:1','max:255'],
        ]);

        $produto = Produto::create($novoProduto);
        return redirect()->route('produto.show',['id'=>$produto->id_produto]);
    }

    public function delete(Request $r){
        $produto = Produto::where('id_produto',$r->id)->first();
        return view('produto.delete',['produto'=>$produto]);
    }

    public function destroy(Request $r){
        $produto = Produto::where('id_produto',$r->id)->first();
        $produto->delete();
        return redirect()->route('produto.index');
    }

    public function edit(Request $r){
        $produto = Produto::where('id_produto',$r->id)->first();
        return view('produto.edit',['produto'=>$produto]);
    }

    public function update(Request $r){
        $produto = Produto::where('id_produto',$r->id)->first();
        $editarProduto = $r->validate([
            'id_produto' =>['nullable','numeric','min:1'],
            'designacao' =>['required','min:1','max:50'],
            'stock' => ['nullable','numeric','min:1'],
            'preco' => ['nullable','numeric','min:1'],
            'id_categoria' =>['nullable','numeric','min:1'],
            'observacoes' =>['nullable','min:1','max:255'],
        ]);
        $produtoAtualizado = $produto->update($editarProduto);
        return redirect()->route('produto.show',['id'=>$produto->id_produto]);
    }
}
