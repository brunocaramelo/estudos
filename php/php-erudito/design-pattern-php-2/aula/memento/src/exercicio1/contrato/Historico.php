<?php

class Historico{

    private $estadoContrato;

    public function __construct(){
        $this->estadoContrato = [];
    }
    
    public function getEstado($index){
        return $this->estadoContrato[$index];
    }

    public function addEstado(Estado $estado){
        $this->estadoContrato[] = $estado;
    }
}