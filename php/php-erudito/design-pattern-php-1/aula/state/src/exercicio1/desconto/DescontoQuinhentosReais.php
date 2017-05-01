<?php
class DescontoQuinhentosReais implements Desconto{
    
    private $proximoDesconto;

    public function desconto(Orcamento $orcamento){
        
        if(  $orcamento->getValor() > 500 ){

            return $orcamento->getValor() * 0.07;
        
        }
        
        return $this->proximoDesconto->desconto($orcamento);        
    }

    public function setProximo(Desconto $proximo){
        $this->proximoDesconto = $proximo;
    }

}