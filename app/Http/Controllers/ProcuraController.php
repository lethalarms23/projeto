<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipa;
use App\Models\Jogador;


class ProcuraController extends Controller
{
    public function index(){
        return view('procura');
    }

    public function pesquisa(Request $r){
        $text = $r -> pesquisainput;
        $res1 = Jogador::where('nome','LIKE','%'.$text.'%')->get();
        $res2 = Equipa::where('designacao','LIKE','%'.$text.'%')->get();
        //dump($text,'res1',$res1);
        //dd('res2',$res2);
        return view('procurares', ['texto'=>$text, 'resultado1'=>$res1, 'resultado2'=>$res2]);
    }
}
