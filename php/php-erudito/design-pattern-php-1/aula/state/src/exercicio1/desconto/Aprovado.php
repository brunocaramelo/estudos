<?php
class Aprovado implements EstadoOrcamento{
    private $descontoAplicado = false;
    public function aplicaDescontoExtra(Orcamento $orcamento) {
       if($this->descontoAplicado) {
         throw new Exception("Desconto já aplicado!");
       }
       $orcamento->setValor( $orcamento->getValor() - $orcamento->getValor() * 0.05 );
    }

    public function aplica( Orcamento $orcamento ){

        $orcamento->setValor( $orcamento->getValor() - $orcamento->getValor() * 0.05 );
    
    }
    
    public function aprova( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi aprovado');
    }

    public function reprova( Orcamento $orcamento ){
        throw new Exception('Este Orcamento ja foi aprovado, nao pode ser reprovado');
    }

    public function finaliza( Orcamento $orcamento ){
        $orcamento->setEstado( new Finalizado() );
    }
    

}