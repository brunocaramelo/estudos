<?php

require '../../../../../autoload/autoload.php';

// require 'Filtro.php';
// require 'Conta.php';
// require 'FiltroMenorQue100Reais.php';
// require 'FiltroMesmoMes.php';


//require 'FiltroMaiorQue500MilReais.php';


$conta = new Conta( 'dunha',500,new DateTime() );

$filtroMes = new FiltroMesmoMes();
$filtrado = $filtroMes->filtra([$conta]);

print_r(['<pre>',$filtrado]);