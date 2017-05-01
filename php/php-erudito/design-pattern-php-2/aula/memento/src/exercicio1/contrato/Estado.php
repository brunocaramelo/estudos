<?php

class Estado{

    private $contrato;
    private $dataHoraGerada;

    public function __construct(Contrato $contrato){
        $this->contrato = $contrato;
        $this->dataHoraGerada = date('Y-m-d H:i:s');
    }

    public function getContrato(){
        return $this->contrato;
    }

}