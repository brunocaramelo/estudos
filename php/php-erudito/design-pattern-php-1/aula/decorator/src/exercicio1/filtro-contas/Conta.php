<?php

class Conta{

    private $nome;
    private $valor;
    private $data;
  
    public function __construct($nome,$valor,$data){
        $this->nome = $nome;
        $this->valor = $valor;
        $this->data = $data;

    }


    public function getNome(){
        return $this->nome;
    }
    
    public function getValor(){
        return $this->valor;
    }
    public function getDataAbertura(){
        return $this->data;
    }

    


}