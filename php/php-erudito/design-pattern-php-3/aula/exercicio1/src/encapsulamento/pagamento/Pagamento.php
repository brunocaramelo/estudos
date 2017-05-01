<?php

class Pagamento {
        
    private $valor;
    private $tipo;
    
    public function __construct( $valor , $tipo ){

        $this->tipo = $tipo;
        $this->valor = $valor;

    }

    public function getTipo(){
        return $this->tipo;
    }
    
    public function getValor(){
        return $this->valor;
    }

    

}