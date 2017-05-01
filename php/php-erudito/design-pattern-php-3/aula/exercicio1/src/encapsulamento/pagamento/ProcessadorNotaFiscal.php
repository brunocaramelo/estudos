<?php

class ProcessadorNotaFiscal{
    
  
    public function processa( $boletos , Fatura $fatura ){
        
        $fatura->calculaImposto();
        
        foreach( $boletos as $boleto ){
           
            $pagamento = new Pagamento( $boleto->getValor() , 1 );
            
            $fatura->addPagamento($pagamento);

        }

        return $fatura->isPago();

    }

}