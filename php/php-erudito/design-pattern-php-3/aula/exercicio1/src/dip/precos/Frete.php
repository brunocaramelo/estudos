<?php

class Frete implements ServicoEntrega{

    public function para( $cidade ){

        $cidadeLower = trim( strtolower( $cidade ) );
        
        if( $cidadeLower == 'sao paulo' ){
            return 15;
        }

        return 30;
    }

}
