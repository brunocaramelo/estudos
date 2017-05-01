<?php 

class Funcionario{

    private $id;
    private $nome;
    private $cargo;
    private $dataAdmissao;
    private $salario;

    public function __construct(Cargo $cargo,$salario){
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    
    public function getNome(){
        return $this->nome;
    }
    
    public function getCargo(){
        return $this->cargo;
    }
    
    public function getdataAdmissao(){
        return $this->dataAdmissao;
    }
    
    public function getSalario(){
        return $this->salario;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setdataAdmissao(DateTime $data){
        $this->dataAdmissao = $data;
    }
    
    public function calculaSalario(){
        return $this->getCargo()->getRegra()->calcula($this);
    }
    
   
}