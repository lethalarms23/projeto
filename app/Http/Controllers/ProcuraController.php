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
        
    }
}
