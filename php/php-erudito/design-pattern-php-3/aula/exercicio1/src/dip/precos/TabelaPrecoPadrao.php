<?php

class TabelaPrecoPadrao implements TabelaPreco{

    public function descontoPara( $valor ){
        return 0.5;
    }

}