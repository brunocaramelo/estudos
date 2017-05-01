<?php

class RaizQuadrada implements Expressao{

    private $numero;
   
    public function __construct(Expressao $numeroParam ){
        
        $this->numero = $numeroParam;
        
    
    }

    public function avalia(){
       
        $numeroVal = $this->numero->avalia();
      
        return sqrt($numeroVal);

    }


    public function aceita(Impressora $impressora){
        $impressora->visitaRaizQuadrada($this);
    }

    public function getNumero(){
        return $this->numero;
    }

  
}