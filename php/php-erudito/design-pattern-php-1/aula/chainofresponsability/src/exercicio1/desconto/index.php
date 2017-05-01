<?php

require '../../../../../autoload/autoload.php';

// require 'Desconto.php';
// require 'Orcamento.php';
// require 'Item.php';
// require 'CalculadoraDeDescontos.php';
// require 'DescontoQuinhentosReais.php';
// require 'DescontoVendaCasada.php';
// require 'DescontoTrezentosReais.php';
// require 'DescontoCincoItens.php';
// require 'SemDesconto.php';

$reforma = new Orcamento(500);

echo 'teste de descontos<br />';

$calculaDescontos = new CalculadoraDeDescontos();

echo 'desconto <br />';

$reforma->addItem(new Item('Tijolo',250));
$reforma->addItem(new Item('Cimento 1kl',250));

// $reforma->addItem(new Item('Cimento 1kl',250));
// $reforma->addItem(new Item('Cimento 1kl',250));
// $reforma->addItem(new Item('Cimento 1kl',250));

echo $calculaDescontos->desconto($reforma);