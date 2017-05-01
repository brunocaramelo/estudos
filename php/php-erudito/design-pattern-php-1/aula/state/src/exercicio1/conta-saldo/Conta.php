<?php

class Conta{

    private $nome;
    public $saldo;
    private $valor;
    private $data;
    public $estado;

    public function __construct($nome,$valor,$data){
        $this->nome = $nome;
        $this->valor = $valor;
        $this->saldo = $valor;
        $this->data = $data;
        $this->estado = new Positivo();

    }


    public function getNome(){
        return $this->nome;
    }
    
    public function getValor(){
        return $this->valor;
    }
    public function getDataAbertura(){
        return $this->data;
    }

    public function saca($valor) {
        $this->estado->saca($this, $valor);
    }

    public function deposita($valor) {
        $this->estado->deposita($this, $valor);
    }
    


}