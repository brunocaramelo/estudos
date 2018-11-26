<?php

namespace Caixa\Tests;

use Caixa\Modelo\Moeda;
use Caixa\Modelo\Caixa;
use Caixa\Factory\DatabaseFactory;
use Caixa\Factory\DatabaseServiceManager;
use Caixa\Config\DatabaseConfig;

class TestCaixa extends \PHPUnit_Framework_TestCase{
	
	private $caixa = null;

	public	function setUp(){
		
		$configObj = new DatabaseConfig();
		$configObj->className = 'Caixa\Modelo\DatabaseMock';
		
		$mock = $this->createMock('Caixa\Modelo\DatabaseMock');

		$mock->expects( $this->any() )
					->method('registrarSaldo')
					->with($this->greaterThan(0));

		$this->caixa = new Caixa(
									DatabaseServiceManager::getInstance('Caixa\Factory\DatabaseMockFactory',$mock)
									->getInstance($configObj)
								);
	
	}

	public	function testDevolverTroco(){
			
		$moedaPrin = new Moeda(25);//R$

		$moedaSub = new Moeda(40,'GUA');
		
		$caixa = $this->caixa;
		$caixa->receberPagamento($moedaPrin);
		$troco = $caixa->getTroco($moedaSub);

		$this->assertEquals(5,$troco);
		
		$caixa->fecharGaveta();
	}

	public	function testDevolverTrocoComPagamentoEmDolar(){
			
		$moedaPrin = new Moeda(30);//R$

		$moedaSub = new Moeda(15,'USD');

		$caixa = $this->caixa;
		$caixa->receberPagamento($moedaSub);
		$troco = $caixa->getTroco($moedaPrin);

		$this->assertEquals(7.5,$troco);
		
		$caixa->fecharGaveta();
	}
	
	public	function testDevolverTrocoComPagamentoEmGuarani(){
			
		$valorDoPrato = new Moeda(25);//R$
		$valorPago2 = new Moeda(40,'GUA');

		$caixa = $this->caixa;
		$caixa->receberPagamento($valorPago2);
		$troco = $caixa->getTroco($valorDoPrato);

		$this->assertEquals(-5,$troco);

		$caixa->receberPagamento(new Moeda(5));
		$troco = $caixa->getTroco($valorDoPrato);

		$this->assertEquals(0,$troco);

		$caixa->fecharGaveta();

		
	}
	
	public	function testGetTroco(){
			
		$moedaPrin = new Moeda(25);//R$

		$moedaSub = new Moeda(40,'GUA');
	
		$caixa = $this->caixa;
		$caixa->receberPagamento($moedaSub);
		$troco = $caixa->getTroco($moedaPrin);
					
		$this->assertEquals(-5,$troco);
		
		$caixa->fecharGaveta();			
	}

	public	function testTipoMoeda(){
			
		$esperado = 'BRL';//R$
		$moeda = new Moeda(25);//R$

		$this->assertEquals($esperado,$moeda->tipo);
		
		$caixa = $this->caixa;
		$caixa->receberPagamento($moeda);
		$caixa->fecharGaveta();
	}


	public	function testTestarSangria(){
			
		$esperado = 'BRL';//R$
		$moeda = new Moeda(25);//R$

		
		$caixa = $this->caixa;
		$caixa->receberPagamento($moeda);
		$caixa->fecharGaveta();
		
		$this->assertEquals(25,$caixa->getSaldo());

		$caixa->sangria();
		
		$this->assertEquals(0,$caixa->getSaldo());
	
	}

public	function testTestarSangriaMock(){


	$configObj = new DatabaseConfig();
	$configObj->className = 'Caixa\Modelo\DatabaseMock';
	
	$mock = $this->createMock('Caixa\Modelo\DatabaseMock');

	$mock->expects( $this->any() )
				->method('registrarSaldo')
				->with($this->greaterThan(0));
	
	$instanceBd = DatabaseServiceManager::getInstance('Caixa\Factory\DatabaseMockFactory',$mock)
									->getInstance($configObj);

	$caixaMock = $this->createMock('Caixa\Modelo\Caixa');
						
	$caixaMock->expects( $this->any() )
					->method('__construct')
					->witch($instanceBd)
					->method('sangria')
					->with($this->greaterThanOrEqual(-1,0));
					
	
}




}