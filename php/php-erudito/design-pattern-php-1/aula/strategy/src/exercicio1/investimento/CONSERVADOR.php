<?php 

class CONSERVADOR implements Investimento{

    public function investir(Conta $conta){
        return ($conta->getValor() * 0.008);
    }

}