<?php

class CalculadoraPreco{
    
    private $tabela = null;
    private $frete = null;

    public function __construct( TabelaPreco $tabela , ServicoEntrega $frete ){
       
        $this->tabela = $tabela;
        $this->frete = $frete;
    
    }

    public function calcula( Compra $produto ){
        
        $desconto = $this->tabela->descontoPara( $produto->getValor() ); 
        
        $frete = $this->frete->para( $produto->getCidade() ); 
        
        return $produto->getValor() * ( 1 - $desconto ) + $frete;

    }

}