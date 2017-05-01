<?php

require '../../../../../autoload/autoload.php';

$pedido1 = new Pedido( 'Nome 1' , 250 );
$pedido2 = new Pedido( 'Nome 2' , 250 );
$pedido3 = new Pedido( 'Nome 3' , 250 );
$pedido4 = new Pedido( 'Nome 4' , 250 );


$fila = new FilaExecucao();

$fila->add( new ComandoPagar( $pedido1 ) );
$fila->add( new ComandoPagar( $pedido2 ) );
$fila->add( new ComandoPagar( $pedido3 ) );
$fila->add( new ComandoPagar( $pedido4 ) );
$fila->add( new ComandoFinalizar( $pedido3 ) );

$fila->processa();

// $mapa = new GoogleMaps();
// $mapa = new MapLink();

// echo '<br /><br />';

// print_r([   
//             '<pre>',
//             'adapter relogio,get dia' => $relogio->getDia(),
//             'adapter relogio,get mes' => $relogio->getMes(),
//             'bridge do mapa retornando' => $mapa->getMapa(),
//         ]);