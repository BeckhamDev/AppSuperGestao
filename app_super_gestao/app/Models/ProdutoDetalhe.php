<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['produto_id','largura','altura','comprimento', 'unidade_id'];

    /**
     * Essa função retorna qual o produto o qual estão sendo exibidos os detalhes
     */
    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
