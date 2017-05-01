<?php

class Contrato{

    private $nome;
    private $data;
    private $tipo;



    public function __construct($nomeParam,$dataParam,$tipoParam= null ){
        $this->nome = $nomeParam;
        $this->data = $dataParam;
        $this->tipo = new Novo();

        if($tipoParam instanceof TipoContrato){
            $this->tipo = $tipoParam;
        }

    }

    public function setTipo(TipoContrato $tipoContrato){
        $this->tipo = $tipoContrato;
    }
    public function avanca(){
        $this->tipo->avanca($this);
    }

    public function salvaContrato(){
        return new Estado( new Contrato( $this->nome , $this->data, $this->tipo ) );
    }

  

}