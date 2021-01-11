<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('vendedor.create');
    }

    public function store(Request $r){
        $novoVendedor = $r->validate([
            'id_vendedor' => ['nullable','numeric','min:1'],
            'nome' => ['required','min:1','max:50'],
            'especialidade' => ['required','min:1','max:50'],
            'email'=> ['nullable','min:1','max:50'],
        ]);

        $vendedor = Vendedor::create($novoVendedor);
        return redirect()->route('vendedor.show',['id'=>$vendedor->id_vendedor]);
    }

    public function delete(Request $r){
        $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
        return view('vendedor.delete',['vendedor'=>$vendedor]);
    }

    public function destroy(Request $r){
        $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
        $vendedor->delete();
        return redirect()->route('vendedor.index');
    }

    public function edit(Request $r){
        $vendedor = Vendedor::where('id_vendedor',$r->id)->first();
        return view('vendedor.edit',['vendedor'=>$vendedor]);
    }

    public function update(Request $r){
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
}
