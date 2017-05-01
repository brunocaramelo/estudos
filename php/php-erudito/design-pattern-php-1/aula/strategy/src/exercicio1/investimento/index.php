<?php 

require '../../../../../autoload/autoload.php';

// require 'Conta.php';
// require 'Investimento.php';
// require 'RealizadorDeInvestimentos.php';
// require 'CONSERVADOR.php';
// require 'MODERADO.php';
// require 'ARROJADO.php';

$reforma = new Conta( 3000.10 );


$calculadora  = new RealizadorDeInvestimentos( $reforma );

echo $calculadora->investir( $reforma , new  CONSERVADOR() );
echo '<br />';
echo $calculadora->investir( $reforma , new MODERADO() );
echo '<br />';
echo $calculadora->investir( $reforma , new ARROJADO() );

