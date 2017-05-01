<?php
class Pedido{

    private $cliente;
    private $valor;
    private $dataFinalizacao;
    
    public function __construct($cliente,$valor,$status=null){

        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->status = new Novo();
        
        if($status instanceof Estado){
            $this->status = $status;
        }
    }

    public function pagar(){
        $this->status = new Pago();
    }
    
    public function finalizar(){
        $this->dataFinalizacao = date("m/d/Y");
        $this->status = new Finalizado();
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function getValor(){
        return $this->valor;
    }
    
    public function getDataFinalizacao(){
        return $this->dataFinalizacao;
    }

}