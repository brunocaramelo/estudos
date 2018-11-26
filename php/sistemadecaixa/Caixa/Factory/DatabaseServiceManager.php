<?php

namespace Caixa\Factory;

class DatabaseServiceManager{
	
	public static function getInstance($factory,$arg = null){
	

		return new $factory($arg);

	}

}