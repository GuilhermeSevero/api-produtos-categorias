<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'tb_produtos';

    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'nome_protuto', 'valor_produto',
    ];

    public $timestamps = false;

    protected $casts = [
        'valor_produto' => 'float',
    ];

    public function categoria_produto()
    {
        return $this->belongsTo('App\CategoriaProduto', 'foreign_key');
    }
}
