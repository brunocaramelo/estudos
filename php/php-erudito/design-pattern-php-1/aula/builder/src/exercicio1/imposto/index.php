<?php

require '../../../../../autoload/autoload.php';

// require 'NotaFiscalBuilder.php';
// require 'NotaFiscal.php';
// require 'Imposto.php';
// require 'TemplateImpostoCondicional.php';
// require 'Orcamento.php';
// require 'CalculadoraDeImpostos.php';
// require 'ItemNotaBuilder.php';
// require 'ItemNota.php';
// require 'ISS.php';
// require 'ICMS.php';
// require 'KCV.php';
// require 'ICCC.php';
// require 'IHIT.php';

$geradorNota = new NotaFiscalBuilder();

$geradorNota->comEmpresa('dunha');
$geradorNota->comCnpj('1234567891');
$geradorNota->comObservacao('olha a observacao');
$geradorNota->nadata();
$geradorNota->addItem( new ItemNota('Tijolo',250));
$geradorNota->addItem( new ItemNota('Cimento 1kg',300));

$gerada = $geradorNota->build();

print_r(['<pre>',$gerada]);