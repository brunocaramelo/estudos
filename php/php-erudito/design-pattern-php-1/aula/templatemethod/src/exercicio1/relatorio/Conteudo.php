<?php

class Conteudo{

    private $nome;
    private $endereco;
    private $email;
    private $telefone;
    private $data;

    public function __construct($nome,$telefone,$data,$endereco=null,$email=null){
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->data = $data;

    }


    public function getNome(){
        return $this->nome;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getData(){
        return $this->data;
    }

    


}