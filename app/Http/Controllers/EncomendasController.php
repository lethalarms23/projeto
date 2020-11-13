<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;

class EncomendasController extends Controller
{
    public function index(){
        $encomendas = Encomenda::paginate(4);
        return view('encomenda.index',['encomenda'=>$encomendas]);
    }

    public function show(Request $r){
        $idEncomenda = $r->id;
        $encomendas = Encomenda::where('id_encomenda',$idEncomenda)->with(['produtos'])->first();
        return view('encomenda.show',['encomenda'=>$encomendas]);
     }
}
