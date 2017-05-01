<?php
class ICCC extends TemplateImpostoCondicional{

    public function __construct(Imposto $imposto = null ){
        parent::__construct($imposto);
    }

    protected function deveUsarOMaximo(Orcamento $orcamento){
        return $orcamento->getValor() > 500;
    }
    
    protected function taxacaoMaxima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.07 + $this->calculaOutroImposto($orcamento);
    }

    protected function taxacaoMinima(Orcamento $orcamento){
        return $orcamento->getValor() * 0.05 + $this->calculaOutroImposto($orcamento);
    }


}
