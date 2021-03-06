<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'tb_categoria_produto';

    protected $primaryKey = 'id_categoria_produto_planejamento';

    protected $fillable = [
        'nome_categoria',
    ];

    public $timestamps = false;
}
