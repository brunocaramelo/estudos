<?php
class ICCC extends TemplateImpostoCondicional{

    protected function deveUsarOMaximo(Orcamento $orcamento){
        return $orcamento->getValor() > 500;
    }
    
    protected function taxacaoMaxima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.07;
    }

    protected function taxacaoMinima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.05;
    }


}
