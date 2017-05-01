<?php 

class MODERADO implements Investimento{

    public function investir(Conta $conta){
        
        $random = mt_rand(1,100);

        $porcentagem = 2.5;
        
        if($random >= 50){
            $porcentagem = 0.7;
        }

        return ($conta->getValor() * $porcentagem);
    }

}