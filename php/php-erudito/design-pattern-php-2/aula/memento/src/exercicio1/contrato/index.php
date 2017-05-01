<?php

require '../../../../../autoload/autoload.php';


$contrato = new Contrato('Contrato nome',date('Y-m-d'));
$historico = new Historico();

print_r(['<pre>',$contrato]);
$historico->addEstado($contrato->salvaContrato());
$contrato->avanca();

print_r([$contrato]);

$historico->addEstado($contrato->salvaContrato());
$contrato->avanca();

print_r([$contrato]);


print_r([$historico->getEstado(0)->getContrato()]);

