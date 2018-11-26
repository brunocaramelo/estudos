<?php

namespace Caixa\Tests;

use Caixa\Modelo\Moeda;
use Caixa\Modelo\Caixa;

class TestMoeda extends \PHPUnit_Framework_TestCase{

	public	function testDevolverTroco(){
			
		$moedaPrin = new Moeda(25);//R$

		$moedaSub = new Moeda(40,'GUA');
		
		$caixa = new Caixa();
		$caixa->receberPagamento($moedaPrin);
		$troco = $caixa->getTroco($moedaSub);

		$this->assertEquals(5,$troco);
			
	}

	public	function testDevolverTrocoComPagamentoEmDolar(){
			
		$moedaPrin = new Moeda(30);//R$

		$moedaSub = new Moeda(15,'USD');

		$caixa = new Caixa();
		$caixa->receberPagamento($moedaSub);
		$troco = $caixa->getTroco($moedaPrin);

		$this->assertEquals(7.5,$troco);
			
	}
	
	public	function testDevolverTrocoComPagamentoEmDolarEGuarani(){
			
		$valorDoPrato = new Moeda(65);//R$

		$valorPago1 = new Moeda(20,'USD');
		$valorPago2 = new Moeda(40,'GUA');

		$caixa = new Caixa();
		$caixa->receberPagamento($valorPago1);
		$caixa->getTroco($valorPago2);

	}
	
	public	function testGetTroco(){
			
		$moedaPrin = new Moeda(25);//R$

		$moedaSub = new Moeda(40,'GUA');
	
		$caixa = new Caixa();
		$caixa->receberPagamento($moedaSub);
		$troco = $caixa->getTroco($moedaPrin);
					
		$this->assertEquals(-5,$troco);
			
	}

	public	function testTipoMoeda(){
			
		$esperado = 'BRL';//R$
		$moeda = new Moeda(25);//R$

		$this->assertEquals($esperado,$moeda->tipo);
			
	}

}