<?php

class Orcamento {
	
	private $valor = null;
	private $itens = null;

	public function __construct($novoValor){
		$this->valor = $novoValor;
		$this->itens = [];
	}
	
	public function getValor(){
		return $this->valor;
	}
	
	public function getItens(){
		return $this->itens;
	}
	
	public function addItem(Item $novoItem){
		$this->itens[] = $novoItem;
	}


}