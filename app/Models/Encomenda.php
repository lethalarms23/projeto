<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $primaryKey='id_encomenda';

    protected $table='encomendas';

    public function produtos(){
        return $this->belongsToMany(
        'App\Models\Produto',
        'encomendas_produtos',
        'id_encomenda',
        'id_produto'
        )->withTimestamps();
    }
}
