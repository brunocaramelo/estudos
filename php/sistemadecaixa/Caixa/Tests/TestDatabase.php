<?php

namespace Caixa\Tests;

class TestDatabase extends \PHPUnit_Framework_TestCase{

	public function testRegistrarSaldo(){

		$database = $this->createMock('Caixa\Modelo\Caixa');

		$database->method('fecharGaveta')
				 ->willReturn(true);

		$this->assertTrue( $database->fecharGaveta() );		 

	}

}