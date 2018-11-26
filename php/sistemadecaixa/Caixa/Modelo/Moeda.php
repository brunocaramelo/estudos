<?php

namespace Caixa\Modelo;

class Moeda{

	private $total = 0;
	private $tipo = null;
	

	public function __construct($valor = 1 ,$tipo = 'BRL')
	{
		$this->total = $valor;
		$this->tipo = $tipo;
	}						

	public function __get($name){

		return $this->$name;
	
	}
	
 
}