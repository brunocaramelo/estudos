<?php

class FilaExecucao{

    private $listaComandos;

    public function __construct(){
    
        $this->listaComandos = [];
    
    }

    public function add( Comando $comando ){

        $this->listaComandos[] = $comando;
    
    }

    public function processa(){

        foreach( $this->listaComandos as $comando ){
            
            $comando->executa();

        }

    }


}