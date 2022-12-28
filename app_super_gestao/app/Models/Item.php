<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /**
     * Função que vai retornar, caso exista, os detalhes dos produtos
     */
    public function itemDetalhe() {
        return $this->hasOne(itemDetalhe::class,'produto_id', 'id' );
    }
}