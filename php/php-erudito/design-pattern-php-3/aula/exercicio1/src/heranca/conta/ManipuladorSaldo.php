<?php

class ManipuladorSaldo{

    private $saldo;

    public function __construct(){
        
        $this->saldo = 0;

    }

    public function saca( $valor ){
        
        if( $valor > 0 && $valor <= $this->saldo ){
        
            return $this->saldo -= $valor;
        
        }

        throw new Exception('Valor de saque Invalido ,saldo :'.$this->saldo.' , valor saque: '.$valor);

    }

    public function deposita( $valor ){
        
        $this->saldo += $valor;

    }

    public function getSaldo(){

        return $this->saldo;
    
    }
    
    public function rende(){

        return $this->saldo += 1.1;
    
    }

}