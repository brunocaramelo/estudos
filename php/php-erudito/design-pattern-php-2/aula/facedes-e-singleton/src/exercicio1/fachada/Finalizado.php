<?php

class Finalizado implements Estado{

    public function avanca( Contrato $contrato ){
       throw new Exception('Contrato ja Finalizado');
    }

}