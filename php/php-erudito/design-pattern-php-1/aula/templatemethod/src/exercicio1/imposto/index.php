<?php

require '../../../../../autoload/autoload.php';

// require 'Imposto.php';
// require 'TemplateImpostoCondicional.php';
// require 'Orcamento.php';
// require 'CalculadoraDeImpostos.php';
// require 'Item.php';
// require 'ISS.php';
// require 'ICMS.php';
// require 'KCV.php';
// require 'ICCC.php';
// require 'IHIT.php';

$reforma = new Orcamento( 3000.10 );

$calculadora  = new CalculadoraDeImpostos( $reforma );

$reforma->addItem(new Item('Tijolo',250));
$reforma->addItem(new Item('Tijolo',250));

echo $calculadora->calcula( $reforma , new  ISS() );
echo '<br />';
echo $calculadora->calcula( $reforma , new ICMS() );
echo '<br />';
echo $calculadora->calcula( $reforma , new KCV() );
echo '<br />';
echo $calculadora->calcula( $reforma , new ICCC() );


echo '<br />';
echo $calculadora->calcula( $reforma , new IHIT() );


