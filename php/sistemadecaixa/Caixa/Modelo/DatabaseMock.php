<?php

 namespace Caixa\Modelo;

 use Caixa\Factory\DatabaseInterface;

 class DatabaseMock implements DatabaseInterface{

 
 	public function registrarSaldo($saldo){
 		
 		$dbo = new DBO();

 		$datahora = new \DateTime();
 		$datahora  = $datahora->getTimeStamp();

 		return $dbo->insert('historico_saldo',[
 												'saldo'=> $saldo,
 												'datahora'=> $datahora
 												]);

 	}

 }