<?php

use Caixa\Modelo;
use Caixa\Tests;

class TestSuite{

	public static function main(){
		
		PHPUnit_TextUI_TestRunner::run(self::suite());
	
	}
	
	public static function suite(){
		
		$suite = new \PHPUnit_Framework_TestSuite('');
		$suite->addTestSuite('Caixa\Tests\TestCaixa');
		$suite->addTestSuite('Caixa\Tests\TestCambio');
		$suite->addTestSuite('Caixa\Tests\TestDatabase');
		return $suite;
	
	}

}