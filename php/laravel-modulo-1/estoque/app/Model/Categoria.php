<?php

namespace estoque\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    public function produtos(){

      return  $this->hasMany('estoque\Model\Produto');

    }

}
