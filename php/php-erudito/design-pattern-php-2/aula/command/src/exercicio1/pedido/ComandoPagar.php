<?php

class ComandoPagar implements Comando{
    
    private $pedido;

    public function __construct( Pedido $pedido ){
       
        $this->pedido = $pedido;

    }

    public function executa(){

        echo 'pagou o pedido do cliente'.$this->pedido->getCliente().'<br />';
        $this->pedido->pagar();
    
    }

}