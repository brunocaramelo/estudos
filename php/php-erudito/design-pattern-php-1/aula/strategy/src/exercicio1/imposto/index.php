<?php

require '../../../../../autoload/autoload.php';
// require 'Orcamento.php';
// require 'CalculadoraDeImpostos.php';
// require 'Imposto.php';
// require 'ISS.php';
// require 'ICMS.php';
// require 'KCV.php';
// require 'ICCC.php';

$reforma = new Orcamento( 3000.10 );

$calculadora  = new CalculadoraDeImpostos( $reforma );

echo $calculadora->calcula( $reforma , new  ISS() );
echo '<br />';
echo $calculadora->calcula( $reforma , new ICMS() );
echo '<br />';
echo $calculadora->calcula( $reforma , new KCV() );
echo '<br />';
echo $calculadora->calcula( $reforma , new ICCC() );


