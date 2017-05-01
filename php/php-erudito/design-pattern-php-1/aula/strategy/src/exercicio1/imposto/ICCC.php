<?php
class ICCC implements Imposto{

    public function calcula(Orcamento $orcamento){
        
        $porcentagemValor = 0.05; 
        $valorOrcamento = $orcamento->getValor();

        if($valorOrcamento >= 1000.00 && $valorOrcamento <= 3000.00){
            $porcentagemValor = 0.07;
        }
        
        if( $valorOrcamento > 3000.00){
            return (  $valorOrcamento   * 0.08 ) + 30.00;
        }

        return ($valorOrcamento * $porcentagemValor);
    }

}