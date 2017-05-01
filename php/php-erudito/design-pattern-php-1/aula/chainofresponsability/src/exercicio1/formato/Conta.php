<?php
class Conta{
    
    private $titular = null;
    private $saldo = null;

    public function __construct($titular,$saldo){
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function getTitular(){
        return $this->titular;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }

}