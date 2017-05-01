<?php

class Novo implements TipoContrato{

    public function avanca( Contrato $contrato ){
        $contrato->setTipo( new EmAndamento() );
    }

}