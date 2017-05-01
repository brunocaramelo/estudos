<?php

require '../../../../../autoload/autoload.php';
// require 'EstadoOrcamento.php';
// require 'Desconto.php';
// require 'Orcamento.php';
// require 'Item.php';
// require 'CalculadoraDeDescontos.php';
// require 'DescontoQuinhentosReais.php';
// require 'DescontoVendaCasada.php';
// require 'DescontoTrezentosReais.php';
// require 'DescontoCincoItens.php';
// require 'SemDesconto.php';
// require 'Aprovado.php';
// require 'Reprovado.php';
// require 'EmAprovacao.php';
// require 'Finalizado.php';

$reforma = new Orcamento(500);

echo 'teste de descontos antes : '.$reforma->getValor().'<br />';
$reforma->aplicaDesconto();
$desconto = $reforma->getValor();
$reforma->aplicaDescontoExtra();
$descontoExtra = $reforma->getValor();
echo 'teste de descontos depois : '.$desconto.' e desconto extra '.$descontoExtra.'<br />';
echo '-------------------------------------------------------------------------<br />';


echo 'teste de descontos antes : '.$reforma->getValor().' aprovar<br />';
$reforma->aplicaDesconto();
$reforma->aprova();
echo 'teste de descontos depois : '.$reforma->getValor().' aprovar <br />';
echo '-------------------------------------------------------------------------<br />';

echo 'teste de descontos antes : '.$reforma->getValor().' finalizar<br />';
$reforma->aplicaDesconto();
$reforma->finaliza();
echo 'teste de descontos depois : '.$reforma->getValor().' finalizar <br />';



