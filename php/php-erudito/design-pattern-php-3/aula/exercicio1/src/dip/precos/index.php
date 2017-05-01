<?php

require '../../../../../autoload/autoload.php';

$compra = new Compra( 3200 , 'Sao Paulo' );

$calculadora = new CalculadoraPreco( new TabelaPrecoPadrao() , new Frete() );

echo $calculadora->calcula($compra);