<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $primaryKey='id_fornecedor';

    protected $table='fornecedores';

    protected $fillable = [
        'nome',
        'morada',
        'id_categoria',
        'telefone',
        'observacoes',
    ];

    public function produtos(){
        return $this->belongsToMany(
            'App\Models\Produto',
            'fornecedores_produtos',
            'id_fornecedor',
            'id_produto'
        );
    }
}
