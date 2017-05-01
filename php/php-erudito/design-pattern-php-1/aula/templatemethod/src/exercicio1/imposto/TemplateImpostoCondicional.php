<?php
abstract class TemplateImpostoCondicional implements Imposto{

    public function calcula(Orcamento $orcamento){
        
        if( $this->deveUsarOMaximo( $orcamento ) ){
            return $this->taxacaoMaxima( $orcamento );    
        }

        return $this->taxacaoMinima( $orcamento );
    }

    protected abstract function deveUsarOMaximo(Orcamento $orcamento);

    protected abstract function taxacaoMaxima(Orcamento $orcamento);

    protected abstract function taxacaoMinima(Orcamento $orcamento);
 

}