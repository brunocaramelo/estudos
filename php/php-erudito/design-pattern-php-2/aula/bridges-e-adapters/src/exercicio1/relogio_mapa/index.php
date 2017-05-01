<?php

require '../../../../../autoload/autoload.php';

$relogio = new Relogio();

$mapa = new GoogleMaps();
$mapa = new MapLink();

echo '<br /><br />';

print_r([   
            '<pre>',
            'adapter relogio,get dia' => $relogio->getDia(),
            'adapter relogio,get mes' => $relogio->getMes(),
            'bridge do mapa retornando' => $mapa->getMapa(),
        ]);