<?php 

class Compra{

    private $cidade;
    private $valor;
   
    public function __construct( $valor , $cidade ){
        $this->cidade = $cidade;
        $this->valor = $valor;
    }

    
    public function getValor(){
        return $this->valor;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    
   
    
   
}