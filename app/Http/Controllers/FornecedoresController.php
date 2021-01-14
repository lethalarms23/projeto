<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = Fornecedor::all();
        return view('fornecedor.index',['fornecedor'=>$fornecedores]);
    }

    public function show(Request $r){
        $fornecedores = Fornecedor::where('id_fornecedor',$r->id)->with(['produtos'])->first();
        return view('fornecedor.show',['fornecedor'=>$fornecedores]);
    }

    public function create(){
        return view('fornecedor.create');
    }

    public function store(Request $r){
        $novoFornecedor = $r->validate([
            'nome' =>['required','min:1','max:50'],
            'morada' =>['nullable','min:1','max:100'],
            'id_categoria' => ['nullable','numeric','min:1'],
            'telefone' => ['nullable','numeric','min:1'],
            'observacoes' =>['nullable','min:1','max:255'],
        ]);
        $fornecedor = Fornecedor::create($novoFornecedor);
        return redirect()->route('fornecedor.show',['id'=>$fornecedor->id_fornecedor]);
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
