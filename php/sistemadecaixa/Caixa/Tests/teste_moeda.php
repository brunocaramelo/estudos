<?php

spl_autoload_register(function($class){
		require '../'.$class.'.php';
});

use Caixa\Modelo\Moeda;

$valorDoPrato = new Moeda(25);//R$

$valorPago = new Moeda(40,'GUA');

// 40 GUA = 20 BRL


function testarConverter($moeda,$esperado){

	$troco = $moeda->converter($moeda);

	if($troco === $esperado){

		return 'passou no teste , valor do convertido : '.$troco."\n";

	}

	return 'Nao passou no teste , valor do convertido : '.$troco."\n";

}

function testarTroco($moedaPrin,$moedaSub){

	$troco = $moedaPrin->subtrair($moedaSub);

	if($troco == 5){
	
		return 'passou no teste , valor do troco : '.$troco."\n";
	
	}

	return 'Nao passou no teste , valor do troco : '.$troco."\n";

}

function testarTipoMoeda($moeda,$tipoEsperado){
	
	if($moeda->tipo === $tipoEsperado){

		return 'passou no teste , valor do tipo : '.$moeda->tipo."\n";

	}

	return 'Nao passou no teste , valor do tipo : '.$moeda->tipo."\n";

}

function testarFuncoes($valorPago,$valorDoPrato){
	
	return [
				testarTipoMoeda($valorPago,'GUA'),
				testarTipoMoeda($valorDoPrato,'BRL'),
				testarTroco($valorDoPrato,$valorPago),
				testarConverter(new Moeda(1,'GUA'),0.5)
			];

}



$retornoGeral = testarFuncoes($valorPago,$valorDoPrato);

print_r($retornoGeral);