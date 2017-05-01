<?php 

class ARROJADO implements Investimento{

   
    public function investir(Conta $conta){
        $random = mt_rand(1,100);
        $porcentagem = 5;
        
        if($random > 20 && $random <= 50){
            $porcentagem = 3;
        }
        
        if($random < 50){
            $porcentagem = 0.6;
        }

        return ($conta->getValor() * $porcentagem);
    }


}