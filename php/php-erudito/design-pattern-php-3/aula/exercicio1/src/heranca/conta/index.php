<?php

require '../../../../../autoload/autoload.php';

$valorDeposito = 30;
$valorSaque = 20;

$contaComum = new ContaComum();

$contaComum->deposita( $valorDeposito );

echo 'saldo conta comum :'. $contaComum->getSaldo().'<br />';

$contaComum->saca( $valorSaque );

echo 'saldo conta comum :'. $contaComum->getSaldo().' , depois do saque de: '.$valorSaque.'.<br />';

$contaComum->rende();

echo 'saldo conta comum :'. $contaComum->getSaldo().' , depois de render.<br />';



echo '<br />------------------------------------------------------------------------------------------------<br /><br />';


$contaEstudante = new ContaEstudante();

$contaEstudante->deposita( $valorDeposito );

echo 'saldo conta estudante :'. $contaEstudante->getSaldo().'<br />';

$contaEstudante->saca( $valorSaque );

echo 'saldo conta estudante :'. $contaEstudante->getSaldo().' , depois do saque de: '.$valorSaque.'.<br />';


echo 'milhas conta estudante :'. $contaEstudante->getMilhas().' .<br />';
