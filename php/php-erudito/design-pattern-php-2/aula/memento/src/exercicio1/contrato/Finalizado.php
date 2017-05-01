<?php

class Finalizado implements TipoContrato{

    public function avanca( Contrato $contrato ){
       throw new Exception('Contrato ja Finalizado');
    }

}