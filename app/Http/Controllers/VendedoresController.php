<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedoresController extends Controller
{
    public function index(){
        $vendedores = Vendedor::paginate(4);
        return view('vendedor.index',['vendedor'=>$vendedores]);
    }

    public function show(Request $r){
        $idVendedor = $r->id;
        $vendedor = Vendedor::where('id_vendedor',$idVendedor)->first();
        return view('vendedor.show',['vendedor'=>$vendedor]);
    }
}
