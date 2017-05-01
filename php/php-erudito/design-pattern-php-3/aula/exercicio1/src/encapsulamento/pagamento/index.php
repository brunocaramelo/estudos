<?php

require '../../../../../autoload/autoload.php';

$boletos = [  
                new Pagamento( 3200 , 1 ),
                new Pagamento( 3200 , 1 ),
                new Pagamento( 3200 , 1 )];

$nf = new NotaFiscal('dunha' , '22222222' ,[2,5] , 3100 , 10 , 'nada' , date('Y-m-d') );

$processador = new ProcessadorNotaFiscal();


echo 'nota foi paga? :'. $processador->processa( $boletos , $nf );