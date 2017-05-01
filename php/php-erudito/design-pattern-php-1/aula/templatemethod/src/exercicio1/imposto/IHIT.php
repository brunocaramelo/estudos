<?php

class IHIT extends TemplateImpostoCondicional{

    protected function deveUsarOMaximo(Orcamento $orcamento){
         $arrAux = [];
         
         foreach($orcamento->getItens() as $itemItem => $objItem){
            
            if(isset($arrAux[$objItem->getNome()])){
                return true;
            }
            
            $arrAux[$objItem->getNome()] = $objItem->getNome();
         }

         return false;
    }
    
    protected function taxacaoMaxima(Orcamento $orcamento){
      
        return ($orcamento->getValor() * 0.13) + 100 ;
    }

    protected function taxacaoMinima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.05;
    }


}