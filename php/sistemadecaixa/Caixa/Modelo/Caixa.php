<?php

namespace Caixa\Modelo;
use Caixa\Factory\DatabaseInterface;

class Caixa{

	private $total;
	/**
	* @var DatabaseInterface 
	*/
	private $database;

	public function __construct( DatabaseInterface $database ){

		$this->database = $database;
	
	}

	public function receberPagamento(Moeda $moeda){
		$this->somar($moeda);
		return $this;
	}
	
	public function somar($moeda){
		
		$real = new Moeda();
		return $this->total += Cambio::converter($moeda,$real);

	}

	public function getTroco(Moeda $moeda){
		
		$real = new Moeda();
		$troco = $this->total - Cambio::converter($moeda,$real); 
		
		return $troco;
	
	}

	private function subtrair(Moeda $moeda){

		$real = new Moeda();
		return $this->total -= Cambio::converter($moeda,$real);
	
	}

	public function getSaldo(){
		
		return $this->total;
	
	}

	public function fecharGaveta(){
		
		$this->database->registrarSaldo( $this->getSaldo() );
	
	}
	
	public function sangria(){

		$this->getSaldo();
		//tem que tirar o saldo do caixa
		$this->total = 0;
	
	}
	

}
