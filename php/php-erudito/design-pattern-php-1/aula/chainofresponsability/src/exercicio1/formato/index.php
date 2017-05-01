<?php

require '../../../../../autoload/autoload.php';

// require 'Resposta.php';
// require 'Formato.php';
// require 'XML.php';
// require 'CSV.php';
// require 'Porcento.php';
// require 'Conta.php';
// require 'Requisicao.php';
// require 'TrataSaida.php';


$contaCorrente = new Conta('Dunha',300);

$formatoXml = new Formato();
$formatoXml->choice = 1;

$formatoCsv = new Formato();
$formatoCsv->choice = 2;


$formatoPorcento = new Formato();
$formatoPorcento->choice = 3;


$saidaConta = new TrataSaida();

echo 'saida xml<br />';
echo $saidaConta->responde(new Requisicao($formatoXml),$contaCorrente);

echo 'saida csv<br />';
echo $saidaConta->responde(new Requisicao($formatoCsv),$contaCorrente);

echo 'saida xml<br />';
echo $saidaConta->responde(new Requisicao($formatoPorcento),$contaCorrente);



