<?php

namespace Caixa\Factory;

class DatabaseFactory{

	public static function getInstance($config){
		
		$class = $config->className;
		return new $class();
	
	}

}