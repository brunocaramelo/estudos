<?php

class Novo implements Estado{

    public function avanca( Contrato $contrato ){
        $contrato->setTipo( new EmAndamento() );
    }

}