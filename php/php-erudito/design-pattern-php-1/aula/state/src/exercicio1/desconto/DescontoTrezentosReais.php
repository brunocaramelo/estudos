<?php
class DescontoTrezentosReais implements Desconto{
    
    private $proximoDesconto;

    public function desconto(Orcamento $orcamento){
        
        if(  $orcamento->getValor() > 300 ){

            return $orcamento->getValor() * 0.03;
        
        }
        
        return $this->proximoDesconto->desconto($orcamento);        
    }

    public function setProximo(Desconto $proximo){
        $this->proximoDesconto = $proximo;
    }

}