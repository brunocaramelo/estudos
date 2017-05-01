<?php

class ContaComum{

    private $manipulador;
    private $taxaJuros = 1.1;

    public function __construct(){
        
        $this->manipulador = new ManipuladorSaldo();

    }

    public function saca( $valor ){
        
        $this->manipulador->saca ($valor );

    }

    public function deposita( $valor ){
        
       $this->manipulador->deposita( $valor );

    }

    public function getSaldo(){

        return $this->manipulador->getSaldo();
    
    }
    
    public function rende(){

        return $this->manipulador->rende( $this->taxaJuros );
    
    }

}