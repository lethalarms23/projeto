<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Like;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produto.index',['produto'=>$produtos]);
    }

    public function show(Request $r){
        $idProduto = $r->id;
        $utilizador = "";
        $likes = Like::where('id_produto',$idProduto)->count();
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $utilizador = Like::where('id_user','like',$idUser)->where('id_produto','like',$idProduto)->first();
        }
        $produto = Produto::where('id_produto',$idProduto)->with('encomendas')->first();
        $categoria = Categoria::where('id_categoria',$produto->id_categoria)->with('produtos')->first();
        return view('produto.show',['produto'=>$produto,'categoria'=>$categoria,'likes'=>$likes,'utilizador'=>$utilizador]);
    }

    public function create(){
        if(Gate::allows('admin')){
            $categoria = Categoria::all();
            return view('produto.create',['categoria'=>$categoria]);
        }
        else{
            return redirect()->route('produto.index')->with('msg','Não têm permissão');
        }
    }

    public function store(Request $r){
        $novoProduto = $r->validate([
            'id_produto' =>['nullable','numeric','min:1'],
            'designacao' =>['required','min:1','max:50'],
            'stock' => ['nullable','numeric','min:1'],
            'preco' => ['nullable','numeric','min:1'],
            'imagem' => ['image','nullable','max:2000'],
            'id_categoria' =>['nullable','numeric','min:1'],
            'observacoes' =>['nullable','min:1','max:255'],
        ]);
        if($r->hasFile('imagem')){
            $nomeImagem = $r->file('imagem')->getClientOriginalName();
            $nomeImagem = time().'_'.$nomeImagem;
            $guardarImagem = $r->file('imagem')->storeAs('imagems/produtos',$nomeImagem);

            $novoProduto['imagem']=$nomeImagem;
        }
        if(Gate::allows('admin')){
            $produto = Produto::create($novoProduto);
            return redirect()->route('produto.show',['id'=>$produto->id_produto]);
        }
        else{
            return redirect()->route('produto.index')->with('msg','Não têm permissão');
        }
    }

    public function delete(Request $r){
        if(Gate::allows('admin')){
            $produto = Produto::where('id_produto',$r->id)->first();
            return view('produto.delete',['produto'=>$produto]);
        }
        else{
            return redirect()->route('produto.index')->with('msg','Não têm permissão');
        }
    }

    public function destroy(Request $r){
        if(Gate::allows('admin')){
            $produto = Produto::where('id_produto',$r->id)->first();
            $imagemAntiga = $produto->imagem;
            if(!is_null($imagemAntiga)){
                Storage::delete('imagems/produtos/'.$imagemAntiga);
            }
            $produto->delete();
            return redirect()->route('produto.index');
        }
        else{
            return redirect()->route('produto.index')->with('msg','Não têm permissão');
        }
    }

    public function edit(Request $r){
        $produto = Produto::where('id_produto',$r->id)->with('categorias')->first();
        $categoria = Categoria::all();
        $categoriaSel = Categoria::where('id_categoria',$produto->id_categoria)->first();
        return view('produto.edit',['produto'=>$produto,'categoria'=>$categoria,'categoriaSel'=>$categoriaSel]);
    }

    public function update(Request $r){
        if(Gate::allows('admin')){
            $produto = Produto::where('id_produto',$r->id)->first();
            $editarProduto = $r->validate([
                'id_produto' =>['nullable','numeric','min:1'],
                'designacao' =>['required','min:1','max:50'],
                'stock' => ['nullable','numeric','min:1'],
                'preco' => ['nullable','numeric','min:1'],
                'id_categoria' =>['nullable','numeric','min:1'],
                'imagem' => ['image','nullable','max:2000'],
                'observacoes' =>['nullable','min:1','max:255'],
            ]);
            $imagemAntiga = $produto->imagem;
            if($r->hasFile('imagem')){
                $nomeImagem = $r->file('imagem')->getClientOriginalName();
                $nomeImagem = time().'_'.$nomeImagem;
                $guardarImagem = $r->file('imagem')->storeAs('imagems/produtos',$nomeImagem);
                if(!is_null($imagemAntiga)){
                    Storage::delete('imagems/produtos/'.$imagemAntiga);
                }
                $editarProduto['imagem']=$nomeImagem;
            }
            $produtoAtualizado = $produto->update($editarProduto);
            return redirect()->route('produto.show',['id'=>$produto->id_produto]);
        }
        else{
            return redirect()->route('produto.index')->with('msg','Não têm permissão');
        }
    }

    public function likes(Request $r){
        $id = $r->id;
        if(Auth()->check()){
            $idUser = Auth::user()->id;
            $like = Like::where('id_user','=',$idUser)->where('id_produto','=',$id)->first();
            if($like == null){
                $novoLike['id_user']=$idUser;
                $novoLike['id_produto']=$id;
                $like = Like::create($novoLike);
                return redirect()->route('produto.show',['id'=>$id]);
            }
            else{
                return redirect()->route('produto.show',['id'=>$id]);
            }
        }
        else{
            return redirect()->route('produto.show',['id'=>$id]->with('msg','Não está logado'));
        }
    }

    public function unlikes(Request $r){
        if(Auth()->check()){
            $idUser = Auth::user()->id;
            $like = Like::where('id_produto',$r->id)->where('id_user',$idUser);
            $like->delete();
            return redirect()->route('produto.show',['id'=>$r->id]);
        }
        else{
            return redirect()->route('produto.index')->with('msg','Não têm permissão');
        }
    }
}
