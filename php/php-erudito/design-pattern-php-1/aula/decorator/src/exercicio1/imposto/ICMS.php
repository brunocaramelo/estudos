<?php
class ICMS extends TemplateImpostoCondicional{
   
    public function __construct(Imposto $imposto = null ){
        parent::__construct($imposto);
    }

    public function deveUsarOMaximo(Orcamento $orcamento){
        return $orcamento->getValor() > 500;
    }
    
    public function taxacaoMaxima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.15 + $this->calculaOutroImposto($orcamento);
    }

    public function taxacaoMinima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.05  + $this->calculaOutroImposto($orcamento);
    }

}