<?php
abstract class TemplateRelatorio implements Relatorio{

    public function imprime(){
       return
       $this->gerarCabecalho( )    
       .$this->gerarCorpo()
       .$this->gerarRodape();

    }

    protected abstract function gerarCabecalho();

    protected abstract function gerarCorpo();

    protected abstract function gerarRodape();
 

}