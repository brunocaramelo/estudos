<?php

require '../../../../../autoload/autoload.php';

$empresaFacadeSing = EmpresaFacade::getInstance();

$empresaFacadeSing->criarPedido('dunha',100);


echo $empresaFacadeSing->getStatusService();

// echo '<br /><br />';

// print_r([   
//             '<pre>',
//             'adapter relogio,get dia' => $relogio->getDia(),
//             'adapter relogio,get mes' => $relogio->getMes(),
//             'bridge do mapa retornando' => $mapa->getMapa(),
//         ]);