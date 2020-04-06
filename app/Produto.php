<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'tb_produto';

    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'nome_produto', 'valor_produto', 'id_categoria_produto'
    ];

    public $timestamps = false;

    protected $casts = [
        'valor_produto' => 'float',
    ];

    public function categoria() {
        return $this->belongsTo('App\Categoria', 'id_categoria_produto');
    }
}
