<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id','largura','altura','comprimento', 'unidade_id'];

    /**
     * Essa função retorna qual o produto o qual estão sendo exibidos os detalhes
     */
    public function item(){
        return $this->belongsTo(Item::class, 'produto_id', 'id');
    }
}
