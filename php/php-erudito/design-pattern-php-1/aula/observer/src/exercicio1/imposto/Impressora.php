<?php

class Impressora implements AcoesAoGerarNota{
    public function executa(NotaFiscal $nf){
        return 'mandei para imprimir';
    }
}