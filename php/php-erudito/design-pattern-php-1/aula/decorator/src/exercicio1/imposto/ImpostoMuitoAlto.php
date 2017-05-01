<?php

class ImpostoMuitoAlto extends TemplateImpostoCondicional{
    
    public function __construct( Imposto $imposto = null ){
        parent::__construct($imposto);
    }

   public function deveUsarOMaximo(Orcamento $orcamento){
        return true;
    }
    
    public function taxacaoMaxima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.2 + $this->calculaOutroImposto($orcamento); 
    }

    public function taxacaoMinima(Orcamento $orcamento){
       return $orcamento->getValor() * 0.2 + $this->calculaOutroImposto($orcamento); 
    }

}