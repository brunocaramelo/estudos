<?php

class Multiplicador implements AcoesAoGerarNota {

  private $fator;

  public function __construct($fator) 
  {
    $this->fator = $fator;
  }
  
  public function executa(NotaFiscal $nf){
        return $nf->getValorBruto() * $this->fator;
  }
}