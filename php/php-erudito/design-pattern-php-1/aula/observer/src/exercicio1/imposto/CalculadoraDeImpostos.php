<?php

class CalculadoraDeImpostos{
	
	public function calcula(Orcamento $orcamento, Imposto $impostoInstance){
		return $impostoInstance->calcula($orcamento);
	}
	
}