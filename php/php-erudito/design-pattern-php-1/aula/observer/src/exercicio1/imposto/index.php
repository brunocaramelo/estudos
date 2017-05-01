<?php

require '../../../../../autoload/autoload.php';


$geradorNota = new NotaFiscalBuilder([new Multiplicador(12)]);
// $geradorNota = new NotaFiscalBuilder();

$geradorNota->comEmpresa('dunha');
$geradorNota->comCnpj('1234567891');
$geradorNota->comObservacao('olha a observacao');
$geradorNota->nadata();
$geradorNota->addItem( new ItemNota('Tijolo',250) );
$geradorNota->addItem( new ItemNota('Cimento 1kg',300) );

// $geradorNota->addAcao( new Impressora() );
// $geradorNota->addAcao( new NotaFiscalDAO() );
// $geradorNota->addAcao( new Multiplicador(5) );

$gerada = $geradorNota->build();

print_r(['<pre>',$gerada]);