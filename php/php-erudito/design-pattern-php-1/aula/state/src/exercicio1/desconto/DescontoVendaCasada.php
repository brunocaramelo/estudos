<?php

class DescontoVendaCasada implements Desconto{

    private $nomesItensDesconto = null;

    private $proximoDesconto = null;

    public function desconto(Orcamento $orcamento){
        
        if( $this->existe('LAPIS',$orcamento) && $this->existe('CANETA',$orcamento) ){

            return $orcamento->getValor() * 0.05;
        
        }

         return $this->proximoDesconto->desconto($orcamento);         
    }

    public function setProximo(Desconto $proximo){
        $this->proximoDesconto = $proximo;
    }


    private function existe($nomeDoItem, Orcamento $orcamento) {
        foreach ($orcamento->getItens() as $item) {
            if($item->getNome() == $nomeDoItem) return true;
        }
        return false;
    }


}