<?php
 
 namespace Caixa\Modelo;

 class Database{
 	
 	private static $instance = null;

 	private function __construct(){

 	}

 	public static function getInstance(){
 		
 		if( is_null( self::$instance ) ){
 		
 			self::$instance = new Database();
 		
 		}

 		return self::$instance;

 	}

 	public function registrarSaldo( $saldo ){
 		return 1;
 	}

 }