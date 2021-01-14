<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\Produto;

class EncomendasController extends Controller
{
    public function index(){
        $encomendas = Encomenda::all();
        return view('encomenda.index',['encomenda'=>$encomendas]);
    }

    public function show(Request $r){
        $idEncomenda = $r->id;
        $encomendas = Encomenda::where('id_encomenda',$idEncomenda)->with('produtos')->first();
        return view('encomenda.show',['encomenda'=>$encomendas]);
    }

    public function create(){
        $produto = Produto::all();
        return view('encomenda.create',['produto'=>$produto]);
    }

    public function store(Request $r){
        $produto = Produto::where('id_produto',$r->id_produto)->with('encomendas')->first();
        $precoProduto = $produto->preco;
        $novaEncomenda = $r->validate([
            'id_produto' => ['required','numeric'],
            'quantidade' => ['nullable','numeric'],
            'preco' => ['nullable','numeric'],
        ]);
        $produto = $r->id_produto;
        $encomenda = Encomenda::create($novaEncomenda);
        $encomenda->produtos()->attach($precoProduto);
        return redirect()->route('encomenda.show',['id'=>$encomenda->id_encomenda]);
    }

    public function delete(Request $r){
        $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
        return view('encomenda.delete',['encomenda'=>$encomenda]);
    }

    public function destroy(Request $r){
        $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
        $encomenda->delete();
        return redirect()->route('encomenda.index');
    }

    public function edit(Request $r){
        $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
        return view('encomenda.edit',['encomenda'=>$encomenda]);
    }

    public function update(Request $r){
        $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
        $editarEncomenda = $r->validate([
            'id_produto' => ['nullable','numeric'],
            'quantidade' => ['nullable','numeric'],
            'preco' =>['nullable','numeric'],
        ]);
        $encomendaUpdated = $encomenda->update($editarEncomenda);
        return redirect()->route('encomenda.show',['id'=>$encomenda->id_encomenda]);
    }
}
