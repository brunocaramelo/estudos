<?php

class LeilaoBuilder{

    private $leilao;

    public function para( $descricao ){
        $this->leilao = new Leilao( $descricao );
        return $this;
    }
    
    public function lance( Usuario $usuario , $valor ){
        $this->leilao->propoe( new Lance( $usuario , $valor ) );
        return $this;
    }
    
    public function build(){
        return $this->leilao;
    }

}