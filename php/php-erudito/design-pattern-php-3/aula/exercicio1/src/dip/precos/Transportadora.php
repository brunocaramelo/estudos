<?php

class Transportadora implements ServicoEntrega{

    public function para( $cidade ){

        $cidadeLower = trim( strtolower( $cidade ) );
        
        if( $cidadeLower == 'sao paulo' ){
            return 5;
        }

        return 15;
    }

}