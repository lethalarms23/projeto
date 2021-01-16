<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Vendedor;
use Auth;

class VendedoresController extends Controller
{
    public function index(){
        $vendedores = Vendedor::all();
        return view('vendedor.index',['vendedor'=>$vendedores]);
    }

    public function show(Request $r){
        $idVendedor = $r->id;
        $vendedor = Vendedor::where('id_vendedor',$idVendedor)->first();
        return view('vendedor.show',['vendedor'=>$vendedor]);
    }

    public function create(){
        if(Gate::allows('admin')){
            return view('vendedor.create');
        }
        else{
            return redirect()->route('vendedor.index')->with('msg','Não têm permissão');
        }
    }

    public function store(Request $r){
        if(Gate::allows('admin')){
            $novoVendedor = $r->validate([
                'id_vendedor' => ['nullable','numeric','min:1'],
                'nome' => ['required','min:1','max:50'],
                'especialidade' => ['required','min:1','max:50'],
                'email'=> ['nullable','min:1','max:50'],
            ]);

            $vendedor = Vendedor::create($novoVendedor);
            return redirect()->route('vendedor.show',['id'=>$vendedor->id_vendedor]);
        }
        else{
            return redirect()->route('vendedor.index')->with('msg','Não têm permissão');
        }
    }

    public function delete(Request $r){
        if(Gate::allows('admin')){
            $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
            return view('vendedor.delete',['vendedor'=>$vendedor]);
        }
        else{
            return redirect()->route('vendedor.index')->with('msg','Não têm permissão');
        }
    }

    public function destroy(Request $r){
        if(Gate::allows('admin')){
            $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
            $vendedor->delete();
            return redirect()->route('vendedor.index');
        }
        else{
            return redirect()->route('vendedor.index')->with('msg','Não têm permissão');
        }
    }

    public function edit(Request $r){
        if(Gate::allows('admin')){
            $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
            return view('vendedor.edit',['vendedor'=>$vendedor]);
        }
        else{
            return redirect()->route('vendedor.index')->with('msg','Não têm permissão');
        }
    }

    public function update(Request $r){
        if(Gate::allows('admin')){
            $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
            $editarVendedor = $r->validate([
                'id_vendedor' => ['nullable','numeric','min:1'],
                'nome' => ['required','min:1','max:50'],
                'especialidade' => ['required','min:1','max:50'],
                'email'=> ['nullable','min:1','max:50'],
            ]);
            $vendedorAtualizado = $vendedor->update($editarVendedor);
            return redirect()->route('vendedor.show',['id'=>$vendedor->id_vendedor]);
        }
        else{
            return redirect()->route('vendedor.index')->with('msg','Não têm permissão');
        }
    }
}
