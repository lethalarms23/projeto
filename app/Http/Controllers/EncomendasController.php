<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Encomenda;
use App\Models\Produto;

class EncomendasController extends Controller
{
    public function index(){
        $encomendas = Encomenda::all();
        return view('encomenda.index',['encomenda'=>$encomendas]);
    }

    public function show(Request $r){
        $encomendas = Encomenda::where('id_encomenda',$r->id)->with('produtos')->first();
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
            'id_produto' => ['required'],
            'quantidade' => ['nullable','numeric'],
            'preco' => ['nullable'],
        ]);
        $novaEncomenda['preco']=$precoProduto;
        $encomenda = Encomenda::create($novaEncomenda);
        $encomenda->produtos()->attach($r->id_produto);
        return redirect()->route('encomenda.show',['id'=>$encomenda->id_encomenda]);
    }

    public function delete(Request $r){
        if(Gate::allows('admin')){
            $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
            return view('encomenda.delete',['encomenda'=>$encomenda]);
        }
        else{
            return redirect()->route('encomenda.index')->with('msg','Não têm permissão');
        }
    }

    public function destroy(Request $r){
        if(Gate::allows('admin')){
            $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
            $encomenda->delete();
            return redirect()->route('encomenda.index');
        }
        else{
            return redirect()->route('encomenda.index')->with('msg','Não têm permissão');
        }
    }

    public function edit(Request $r){
        if(Gate::allows('admin')){
            $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
            $produtos = Produto::all();
            $produtosEncomendas=[];
            foreach($encomenda->produtos as $produto){
                $produtosEncomendas[]=$produto->id_produto;
            }
            return view('encomenda.edit',['encomenda'=>$encomenda,'produtoEnc'=>$produtosEncomendas,'produto'=>$produtos]);
        }
        else{
            return redirect()->route('encomenda.index')->with('msg','Não têm permissão');
        }
    }

    public function update(Request $r){
        if(Gate::allows('admin')){
            $encomenda = Encomenda::where('id_encomenda',$r->id)->first();
            $editarEncomenda = $r->validate([
                'id_produto' => ['nullable','numeric'],
                'quantidade' => ['nullable','numeric'],
                'preco' =>['nullable','numeric'],
            ]);
            $encomendaUpdated = $encomenda->update($editarEncomenda);
            return redirect()->route('encomenda.show',['id'=>$encomenda->id_encomenda]);
        }
        else{
            return redirect()->route('encomenda.index')->with('msg','Não têm permissão');
        }
    }
}
