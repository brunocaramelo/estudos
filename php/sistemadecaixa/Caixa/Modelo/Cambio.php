<?php

namespace Caixa\Modelo;

class Cambio{

	private static $fatoresDeConversao = [
										'BRL' => [
													'USD' => 0.75,
													'GUA' => 2,
													'BRL' => 1,
													],
										'USD' => [
													'BRL' => 2.5,
													'GUA' => 4,
													'USD' => 1,
													],
										'GUA' => [
													'USD' => 0.25,
													'BRL' => 0.5,
													'GUA' => 1,
													],
										];

	public static  function getFatoresDeConversao(){

		return self::$fatoresDeConversao;
	
	}

	public static function converter(Moeda $origem,Moeda $destino){
			
		return ($origem->total * Cambio::getFatoresDeConversao()[$origem->tipo][$destino->tipo]);
	
	}

}