<?php

class Soma implements Expressao{

    private $esquerdo;
    private $direito;

    public function __construct(Expressao $esquerdoParam , Expressao $direitoParam ){
        
        $this->esquerdo = $esquerdoParam;
        $this->direito = $direitoParam;
    
    }

    public function avalia(){
       
        $esquerdaVal = $this->esquerdo->avalia();
        $direitaVal = $this->direito->avalia();

        return $esquerdaVal + $direitaVal;

    }

}