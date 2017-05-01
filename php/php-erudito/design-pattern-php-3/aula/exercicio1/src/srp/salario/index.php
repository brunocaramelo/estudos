<?php

require '../../../../../autoload/autoload.php';



$desenvolvedor = new Funcionario( new Desenvolvedor( new DezOuVintePorcento() ) , 3200 );

$calculadora = new CalculadoraSalario();

echo $calculadora->calcula($desenvolvedor);