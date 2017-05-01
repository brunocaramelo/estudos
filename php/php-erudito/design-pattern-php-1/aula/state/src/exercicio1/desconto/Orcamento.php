<?php

class Orcamento {
	
	private $valor = null;
	private $itens = null;
	private $estado = null;


	public function __construct($novoValor){
		$this->valor = $novoValor;
		$this->itens = [];
		$this->estado = new EmAprovacao();
	}
	
	public function getValor(){
		return $this->valor;
	}
	
	public function setValor($valor){
		$this->valor = $valor;
	}
	
	public function getItens(){
		return $this->itens;
	}
	
	public function addItem(Item $novoItem){
		$this->itens[] = $novoItem;
	}

	public function setEstado(EstadoOrcamento $novoEstado){
		$this->estado = $novoEstado;
	}

	public function aplicaDesconto(){
		$this->estado->aplica($this);
	}
	
	public function aprova(){
		$this->estado->aprova($this);
	}
	
	public function reprova(){
		$this->estado->reprova($this);
	}

	public function finaliza(){
		$this->estado->finaliza($this);
	}

	public function aplicaDescontoExtra() {
        $this->estado->aplicaDescontoExtra($this);
    }

}