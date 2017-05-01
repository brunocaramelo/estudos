<?php

class DescontoCincoItens implements Desconto{
    
    private $proximoDesconto;

    public function desconto(Orcamento $orcamento){
        
        if( count( $orcamento->getItens() ) >= 5 ){

            return $orcamento->getValor() * 0.05;
        
        }

         return $this->proximoDesconto->desconto($orcamento);         
    }

    public function setProximo(Desconto $proximo){
        $this->proximoDesconto = $proximo;
    }
}