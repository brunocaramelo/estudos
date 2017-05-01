<?php

class Numero implements Expressao{
    
    private $numero = null;

    public function __construct($numero){

        $this->numero = $numero;

    }

    public function avalia(){
        return $this->numero;
    }
    
    public function getNumero(){
        return $this->numero;
    }

    public function aceita(Impressora $impressora){
        $impressora->visitaNumero($this);
    }

}