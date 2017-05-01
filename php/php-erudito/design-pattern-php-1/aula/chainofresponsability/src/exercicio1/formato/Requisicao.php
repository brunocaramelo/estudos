<?php

class Requisicao {
    private $formato;

    public function __construct($formato) {
        $this->formato = $formato;
    }

    public function getFormato(){
    
        if($this->formato->choice === 1){
            return 'XML';
        }

         if($this->formato->choice === 2){
             return 'CSV';
        }

         if($this->formato->choice === 3){
             return 'PORCENTO';
        }
    }

}
