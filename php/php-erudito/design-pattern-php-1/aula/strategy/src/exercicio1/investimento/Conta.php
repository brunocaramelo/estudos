<?php

class Conta {
	
	private $valor = null;

	public function __construct($novoValor){
		$this->valor = $novoValor;
	}
	
	public function getValor(){
		return $this->valor;
	}
	
	public function getSaldo(){
		return $this->valor;
	}

	public function deposita($valor) {
          $this->valor += $valor;
    }

}