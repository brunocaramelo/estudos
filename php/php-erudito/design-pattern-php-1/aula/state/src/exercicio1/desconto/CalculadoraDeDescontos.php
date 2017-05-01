<?php

class CalculadoraDeDescontos{

    public function desconto(Orcamento $orcamento){
        
        $descontoCincoItens = new DescontoCincoItens();        
        $descontoQuinhentosReais = new DescontoQuinhentosReais();        
        $descontoVendaCasada = new DescontoVendaCasada();        
        $descontoTrezentosReais = new DescontoTrezentosReais();        
        $semDesconto = new SemDesconto();        
        
        $descontoCincoItens->setProximo($descontoQuinhentosReais);        
        $descontoQuinhentosReais->setProximo($descontoVendaCasada);        
        $descontoVendaCasada->setProximo($descontoTrezentosReais);        
        $descontoTrezentosReais->setProximo($semDesconto);        
        
        $valorDesconto = $descontoCincoItens->desconto($orcamento);

        return $valorDesconto;

    }
   

}