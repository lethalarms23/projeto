<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey='id_categoria';

    protected $table='categorias';

    protected $fillable=[
        'id_produto',
        'quantidada',
        'preco',
    ];  

    public function produtos(){
        return $this->hasMany('App\Models\Produto','id_produto');
    }
}
