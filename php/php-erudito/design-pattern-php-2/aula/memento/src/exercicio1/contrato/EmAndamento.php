<?php

class EmAndamento implements TipoContrato{

    public function avanca( Contrato $contrato ){
        $contrato->setTipo( new Finalizado() );
    }

}