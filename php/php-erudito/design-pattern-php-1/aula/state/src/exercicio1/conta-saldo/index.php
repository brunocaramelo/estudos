<?php

require '../../../../../autoload/autoload.php';
// require 'EstadoConta.php';
// require 'Positivo.php';
// require 'Negativo.php';
// require 'Conta.php';

$conta = new Conta( 'dunha',500,new DateTime() );

$conta->saca(600);

$filtrado = $conta->getValor();


print_r(['<pre>',$filtrado]);