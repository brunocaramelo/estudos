<?php

function carregaClassesPath($className){
	$caminhoArq = getcwd().'/'.$className.'.php';	
	
	if(file_exists($caminhoArq)) require getcwd().'/'.$className.'.php';

}

spl_autoload_register('carregaClassesPath');
