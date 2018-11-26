<?php

namespace Caixa\Factory;

class DatabaseMockFactory{
	
	private $mock;

	public function __construct($mock){
		
		$this->mock =  $mock;
	
	}
	
	public  function getInstance($config){

		return $this->mock;
	
	}

}