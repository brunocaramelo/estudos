<?php
class RealizadorDeInvestimentos{

    public function investir( Conta $conta , Investimento $investimentoInstance ){

        $resultado =   $investimentoInstance->investir($conta);
        $conta->deposita($resultado * 0.75 );
        
        return $conta->getSaldo();
    }

}