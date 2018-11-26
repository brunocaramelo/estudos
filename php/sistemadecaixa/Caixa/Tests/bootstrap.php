<?php
date_default_timezone_set('America/Sao_Paulo');

use Caixa\Tests\Psr4AutoloaderClass;

require 'Psr4AutoloaderClass.php';
/**ver depois**/

$psr4 = new Psr4AutoloaderClass();
$psr4->addNameSpace('Caixa\Modelo',__DIR__.'/../Modelo');
$psr4->addNameSpace('Caixa\Factory',__DIR__.'/../Factory');
$psr4->addNameSpace('Caixa\Config',__DIR__.'/../Config');
$psr4->addNameSpace('Caixa\Tests',__DIR__.'/');
$psr4->register();