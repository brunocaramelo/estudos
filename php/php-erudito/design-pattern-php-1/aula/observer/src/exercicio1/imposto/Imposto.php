<?php
abstract class Imposto{

    protected $outroImposto = null;

    public function __construct( $imposto = null ){
        $this->outroImposto = $imposto;
    }

    protected abstract function calcula(Orcamento $orcamento);

    public function calculaOutroImposto( Orcamento $orcamento ){
        
        if(! $this->outroImposto instanceof Imposto) return 0;

        return $this->outroImposto->calcula($orcamento);
    }

}