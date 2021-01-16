<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $primaryKey='id_produto';

    protected $table='produtos';


    protected $fillable=[
        'id_vendedor',
        'id_categoria',
        'designacao',
        'stock',
        'preco',
        'observacoes',
        'imagem',
    ];

    public function encomendas(){

        return $this->belongsToMany(
        'App\Models\Encomenda',
        'encomendas_produtos',
        'id_produto',
        'id_encomenda'
        )->withTimestamps();
    }

    public function fornecedores(){
        return $this->belongsToMany(
            'App\Models\Fornecedor',
            'fornecedores_produtos',
            'id_produto',
            'id_fornecedor'
        )->withTimestamps();
    }

    public function categorias(){
        return $this->belongsTo(
            'App\Models\Categoria',
            'id_categoria'
        );
    }
}
