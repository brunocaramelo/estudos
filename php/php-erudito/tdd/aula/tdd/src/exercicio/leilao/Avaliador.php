<?php

class Avaliador{
    
    private $maiorValor = -INF;
    private $menorValor =  INF;
    private $lanceValores =  [];

    public function avalia( Leilao $leilao ){

        if( count( $leilao->getLances() ) === 0 ){
            throw new InvalidArgumentException('O leilao deve ter ao menos um lance');
        }

        foreach( $leilao->getLances() as $lance ){

            $this->lanceValores[] =  $lance->getValor();
            
            if( $lance->getValor() > $this->maiorValor){
                $this->maiorValor = $lance->getValor();
            }
            
            if( $lance->getValor() < $this->menorValor){
                $this->menorValor = $lance->getValor();
            }

        }

    }

    public function getMaiorLance(){
        return $this->maiorValor;
    }

    public function getMenorLance(){
        return $this->menorValor;
    }
    
    public function getMediaLances(){
        return array_sum($this->lanceValores) / count($this->lanceValores);
    }
    
    public function getListaMaioresLances($quantidade = 3){
        return array_slice($this->lanceValores,0,3);
    }

}