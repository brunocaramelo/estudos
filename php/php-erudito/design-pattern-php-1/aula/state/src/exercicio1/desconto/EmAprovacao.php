<?php
class EmAprovacao implements EstadoOrcamento{
    private $descontoAplicado = false;
    public function aplicaDescontoExtra(Orcamento $orcamento) {
        
        if($this->descontoAplicado) {
         throw new Exception("Desconto já aplicado!");
        }

        $orcamento->setValor( $orcamento->getValor() - $orcamento->getValor() * 0.05 );
    }

    public function aplica( Orcamento $orcamento ){

        $orcamento->setValor( $orcamento->getValor() - $orcamento->getValor() * 0.02 );
    
    }

    public function aprova( Orcamento $orcamento ){
         $orcamento->setEstado( new Aprovado() );
    }

    public function reprova( Orcamento $orcamento ){
        $orcamento->setEstado( new Reprovado() );
    }

    public function finaliza( Orcamento $orcamento ){
        throw new Exception('Estado em aprovacao , deve ser aprovado');
    }

}