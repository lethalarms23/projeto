<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = Fornecedor::paginate(4);
        return view('fornecedor.index',['fornecedor'=>$fornecedores]);
    }
}
