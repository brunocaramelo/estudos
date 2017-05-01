<?php

namespace estoque\Model;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    
    public $timestamps = false;

    protected $fillable = [
                           'nome',
                           'descricao',
                           'quantidade',
                           'tamanho',
                           'valor',
                           'categoria_id'
                           ];

    public function categoria(){

       return $this->belongsTo('estoque\Model\Categoria');

    }

}
