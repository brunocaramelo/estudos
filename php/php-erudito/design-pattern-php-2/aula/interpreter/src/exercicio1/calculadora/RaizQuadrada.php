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

}