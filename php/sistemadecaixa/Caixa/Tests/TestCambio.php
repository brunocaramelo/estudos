<?php

namespace Caixa\Tests;
use Caixa\Modelo\Cambio;

class TestCambio extends \PHPUnit_Framework_TestCase{

	public function testFatoresDeConversao(){
		
		$cambioVals = Cambio::getFatoresDeConversao();
		
		$this->assertArrayHasKey('USD',$cambioVals);		
		$this->assertArrayHasKey('BRL',$cambioVals);		
		$this->assertArrayHasKey('GUA',$cambioVals);		
		$this->assertArrayNotHasKey('EUR',$cambioVals);		
	
	}

}