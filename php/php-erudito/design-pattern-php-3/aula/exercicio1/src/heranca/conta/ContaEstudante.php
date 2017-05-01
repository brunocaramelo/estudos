<?php

class ContaEstudante extends ContaComum{
    
    private $manipulador;
    private $taxaJuros = 0;
    private $milhas = 0;

    public function __construct(){
        
        $this->manipulador = new ManipuladorSaldo();

    }

    public function getMilhas(){

        return $this->milhas;
        
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

}