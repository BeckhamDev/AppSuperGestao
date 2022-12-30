<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fornecedor extends Model
{
    protected $table = 'fornecedors';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    /**
     * Retorna os produtos que cada fornecedor tem
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
    }
}
