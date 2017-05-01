<?php

class KCV extends TemplateImpostoCondicional{
    
    public function __construct( Imposto $imposto = null ){
        parent::__construct($imposto);
    }

   public function deveUsarOMaximo(Orcamento $orcamento){
        return true;
    }
    
    public function taxacaoMaxima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.15 + $this->calculaOutroImposto($orcamento);
    }

    public function taxacaoMinima(Orcamento $orcamento){
        return $this->taxacaoMaxima($orcamento) + $this->calculaOutroImposto($orcamento);
    }

}