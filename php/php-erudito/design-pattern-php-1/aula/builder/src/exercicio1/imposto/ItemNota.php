<?php

class ItemNota {
    private $nome;
    private $valor;

    public function __construct($nomeParam,$valorParam){
        $this->nome = $nomeParam;
        $this->valor = $valorParam;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getValor(){
        return $this->valor;
    }

}