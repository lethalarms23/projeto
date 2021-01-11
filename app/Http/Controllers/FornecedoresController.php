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
}
