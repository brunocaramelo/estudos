<?php

require '../../../../../autoload/autoload.php';


$impressora = new Impressora();

$esquerdo = new Soma( new  Numero(10) , new Numero(10) );
$direito = new Subtracao( new Numero(80) , new Numero(10) );

$soma = new Soma( $esquerdo , $direito );



$subtracao = new Subtracao( new Numero(150) , $direito );

$multiplicacao = new Multiplicacao( new Numero(150) ,new Numero(10) );

$divisao = new Divisao( new Numero(150) , new Numero(5) );

$raiz = new RaizQuadrada( new Numero(15)  );

/*imprime a expressao*/
$soma->aceita($impressora);

echo '<br /><br />';

print_r([   
            '<pre>',
            'soma 1' => $soma->avalia(), 
            'subtracao 1' => $subtracao->avalia(),
            'multiplicacao 1' => $multiplicacao->avalia(), 
            'divisao 1' => $divisao->avalia(),
            'raiz quadrada 1' => $raiz->avalia(),
        ]);